<?php
require_once("../config/config.php");
include "../databaseQueries/databaseQueries.php";
include "../helper/helpFunctions.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["addType"])){
        $addType=intval($_POST["addType"]);
        if ($addType >= 0 && $addType <= 3) {
            $msg = '';
            $errorWords='';
			$count=0;
            if (isset ($_FILES["fileCSV"]["tmp_name"])) {
                //slová
                if ($addType == 0) {
                    $subtypes = [];
                    $subtypesId = [];
                    $file_name = $_FILES["fileCSV"]["tmp_name"];
                    $opened_file = fopen($file_name, "r");
                    $types = ["podstatne meno", "pridavne meno", "sloveso", "veta"];
                    $nounTypesRows = 0;
                    $result = selectNounTypes($conn);
                    if ($result) {
                        $nounTypesRows = (int)$result->num_rows;
                        while ($subtype = mysqli_fetch_assoc($result)) {
                            array_push($subtypes, $subtype["type_name"]);
                            array_push($subtypesId, $subtype["id"]);
                        }
                    }
                    while ($line = fgetcsv($opened_file, 500,";")) {
                        $result = null;
                        if ((isset ($line[0]) && strlen($line[0]) <= 128) && (isset ($line[1]) && strlen($line[1]) <= 128)
                            && (isset ($line[2]) && in_array($line[2], $types))) {
                            if (($line[2] != "podstatne meno" && $line[2] != "veta") ||
                                (($line[2] === "podstatne meno" || $line[2] === "veta") &&
								isset ($line[3]))) {
                                $japWord = mb_escape($line[0]);
                                $svkWord = mb_escape($line[1]);
                                $type = $line[2];
                                $nounTypeLine = ($type == "podstatne meno" || $type == "veta") ? explode(',',$line[3]) : NULL;
								$nounTypes=[];
								if ($nounTypeLine!=NULL){
									foreach ($nounTypeLine as $nounType){
										if ((in_array($nounType, $subtypes)))
											array_push($nounTypes,$subtypesId[array_search($nounType, $subtypes)]) ;
									}
								}
								else
									$nounTypes=NULL;
								$kanji = (isset ($line[4]) && $line[4]!='NULL') ? mb_escape($line[4]) : '';
                                $type=mb_escape($type);
								$checkNounTypes=$nounTypes != NULL ? implode(',',$nounTypes) : NULL;
                                $checkJapWord = selectWordByNameTypeNounType($conn, $japWord,$type,$checkNounTypes);
								if (($checkJapWord && $checkJapWord->num_rows===0)
								&& !(($type === "podstatne meno" || $type === "veta") && $nounTypes == NULL)) {
                                    $result = insertWord($conn, $japWord, $svkWord, $type,$kanji);
									if ($nounTypes != NULL){
										$insertedID=$conn->insert_id;
										foreach ($nounTypes as $nounTypeID){
											insertWordSubtypes($conn,$insertedID,$nounTypeID);
										}
									}
                                    if ($result){
                                        $msg .= $line[0] . ', ';
										$count += 1;
									}
                                }
                                else
                                    $errorWords .= $line[0] . ', ';
                            }
                        }
                    }
                }
                //grammar
                else if ($addType == 1){
                    $file_name = $_FILES["fileCSV"]["tmp_name"];
                    $opened_file = fopen($file_name, "r");
                    while ($line = fgetcsv($opened_file, 328,";")) {
                        if ((isset ($line[0]) && strlen($line[0]) <= 64) && (isset ($line[1]) && strlen($line[1]) <= 256)){
                            $grammarTitle = mb_escape($line[0]);
                            $grammarDescription = mb_escape($line[1]);
                            $checkGrammar = selectGrammarByTitle($conn, $grammarTitle);
                            if ($checkGrammar && ($checkGrammar->num_rows) === 0) {
                                $result = insertGrammar($conn, $grammarTitle,$grammarDescription);
                                if ($result){
                                    $msg .= $line[0] . ', ';
									$count += 1;
								}
                            }
                            else
                                $errorWords .= $line[0] . ', ';
                        }
                    }
                }
                //grammar sentences
                else if ($addType == 2){
                    $file_name = $_FILES["fileCSV"]["tmp_name"];
                    $opened_file = fopen($file_name, "r");
                    while ($line = fgetcsv($opened_file, 256,";")) {
                        if ((isset ($line[0]) && strlen($line[0]) <= 64) && (isset ($line[1]) && strlen($line[1]) <= 128)
                            && (isset ($line[2]) && strlen($line[2]) <= 128)){
                            $grammarTitle = mb_escape($line[0]);
                            $grammarJapSentence = mb_escape($line[1]);
                            $grammarSvkSentence = mb_escape($line[2]);
                            $checkGrammar = selectGrammarByTitle($conn, $grammarTitle);
                            if ($checkGrammar && ($checkGrammar->num_rows) !== 0) {
                                $result = insertGrammarSentence($conn, mysqli_fetch_assoc($checkGrammar)["id"],$grammarJapSentence,$grammarSvkSentence);
                                if ($result){
                                    $msg .= $line[1] . ', ';
									$count += 1;
								}
                            }
                            else
                                $errorWords .= $line[1] . ', ';
                        }
                    }
                }
                //kanji
                else if ($addType==3){
                    $file_name = $_FILES["fileCSV"]["tmp_name"];
                    $opened_file = fopen($file_name, "r");
                    while ($line = fgetcsv($opened_file, 256,";")) {
                        if ((isset ($line[0]) && strlen($line[0]) <= 16) && (isset ($line[1]) && strlen($line[1]) <= 32)
                            && (isset ($line[2]) && strlen($line[2]) <= 32) && (isset ($line[3]) && strlen($line[3]) <= 32)) {
                            $kanji = mb_escape($line[0]);
                            $kunyoumi = mb_escape($line[1]);
                            $onyoumi = mb_escape($line[2]);
                            $slovak = mb_escape($line[3]);
                            $result = insertKanji($conn, $kanji, $kunyoumi, $onyoumi, $slovak);
                            if ($result){
                                $msg .= $line[0] . ', ';
								$count += 1;
							}
                        }
                    }
                }
                if (!empty($msg)){
                    $msg = "<h2 class='blue'>Úspešne pridané (".$count."): ".$msg."</h2>";
                    if (!empty($errorWords))
                        $msg .= "<h3 class='red'>Neúspešne pokusy: ".$errorWords."</h3>";
                    echo json_encode(["scs" => true,"msg" => $msg]);
                }
                else
                    echo json_encode(["scs" => false,"msg" => "<h2 class='red'>Súbor nie je csv, má nesprávnu štruktúru, je prázdny alebo obsahuje len duplikáty</h2>"]);
            }
        }
        else http_response_code(400);
    }
    else http_response_code(400);
}
else http_response_code(400);
