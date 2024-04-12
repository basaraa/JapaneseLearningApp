<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../config/config.php");
    include "../databaseQueries/databaseQueries.php";
    include "../helper/helpFunctions.php";
    if (isset($_POST["editType"])) {
        $editType = intval($_POST["editType"]);
        //word
        if ($editType == 0) {
            if (isset($_POST["wordID"]) && isset($_POST["japWord"]) && isset($_POST["svkWord"])
				&& isset($_POST["type"]) && (isset($_POST["nounType"]) 
					|| (in_array($_POST["type"],['pridavne meno','sloveso']))) 
				&& isset($_POST["kanji"])) {
                $japWord = mb_escape($_POST["japWord"]);
                $svkWord = mb_escape($_POST["svkWord"]);
                $wordID= intval($_POST["wordID"]);
                $type = $_POST["type"];
                $nounTypes = ($type == "podstatne meno" || $type == "veta") ? $_POST["nounType"] : NULL;
				$kanji = $_POST["kanji"] == NULL ? '': mb_escape($_POST["kanji"]);
                $type = mb_escape($type);
				$checkNounTypes=$nounTypes != NULL ? implode(',',$nounTypes) : NULL;
				$checkJapWord = selectWordByNameTypeNounType($conn, $japWord,$type,$checkNounTypes);				
                //ak sa nenašlo žiadne slovo alebo našlo len samého seba
				if ($checkJapWord && 
						($checkJapWord->num_rows==0 ||
						mysqli_fetch_assoc($checkJapWord)['id']==$wordID 
							&& $checkJapWord->num_rows==1
						)
					)
				{
                    $result = updateWord($conn,$wordID, $japWord, $svkWord, $type,$kanji);
                    if ($result) {
						if ($nounTypes != NULL){
							//generovanie podtypov slova
							$result_wordSubtypes=selectWordSubtypesNamesByWordID($conn,$wordID);
							if ($result_wordSubtypes){
								$wordSubtypesRow=mysqli_fetch_assoc($result_wordSubtypes);
								$rowSubTypes=explode(',',$wordSubtypesRow['word_subtype_id']);
								//prechádzanie všetkých typov a mazanie tých čo už neplatia+pridávanie nových
								foreach ($nounTypes as $nounTypeID){
									if (!(in_array($nounTypeID,$rowSubTypes)))
										insertWordSubtypes($conn,$wordID,$nounTypeID);
									else{
										unset($rowSubTypes[array_search($nounTypeID,$rowSubTypes)]);
										$rowSubTypes=array_values($rowSubTypes);
									}
								}
								$rowSubTypes=array_values($rowSubTypes);
								foreach ($rowSubTypes as $rowSubTypeID){
									deleteWordSubtypesByWordID($conn,$wordID,$rowSubTypeID);
								}
							}
						}
                        echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne upravené slovo: ' . $japWord . '</h2>']);
                    } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
                } else
                    echo json_encode(["scs" => false, "msg" => '<h2 class="red">Slovo: ' . $japWord . ' existuje</h2>']);
            } else http_response_code(400);
        }
        //grammar
        else if ($editType == 1){
            if (isset($_POST["grammarID"]) && isset($_POST["grammarTitle"]) && isset($_POST["grammarDescription"])
                && isset($_POST["sentences"])) {
                $grammarTitle = mb_escape($_POST["grammarTitle"]);
                $grammarDescription = mb_escape($_POST["grammarDescription"]);
                $grammarID= intval($_POST["grammarID"]);
                $sentences=$_POST["sentences"];
                $checkgrammar = selectGrammarByTitleCheckDuplicate($conn, $grammarTitle,$grammarID);
                if ($checkgrammar && ($checkgrammar->num_rows) === 0) {
                    $result = updateGrammar($conn,$grammarID,$grammarTitle,$grammarDescription);
                    if ($result) {
                        if (!empty($sentences))
                            deleteGrammarSentences($conn, $grammarID, $sentences);
                        echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne upravená gramatika: ' . $grammarTitle . '</h2>']);
                    } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
                } else
                    echo json_encode(["scs" => false, "msg" => '<h2 class="red">Gramatika s názvom: ' . $grammarTitle . ' existuje</h2>']);
            } else http_response_code(400);
        }
        //sentence
        else if ($editType == 2){
            if (isset($_POST["sentenceID"]) && isset($_POST["sentenceJap"]) && isset($_POST["sentenceSvk"])) {
                $sentenceID= intval($_POST["sentenceID"]);
                $sentenceJap = mb_escape($_POST["sentenceJap"]);
                $sentenceSvk = mb_escape($_POST["sentenceSvk"]);
                $result = updateSentence($conn,$sentenceID,$sentenceJap,$sentenceSvk);
                if ($result) {
                    echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne upravená veta: ' . $sentenceJap . '</h2>']);
                } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
            } else http_response_code(400);
        }
		else if ($editType == 3){
            if (isset($_POST["kanjiID"]) && isset($_POST["kanji_char"]) && isset($_POST["kunyoumi"]) 
				&& isset($_POST["onyoumi"]) && isset($_POST["slovak"])) {
                $kanjiID= intval($_POST["kanjiID"]);
				$kanji_char=mb_escape($_POST["kanji_char"]);
				$kunyoumi=mb_escape($_POST["kunyoumi"]);
				$onyoumi=mb_escape($_POST["onyoumi"]);
				$slovak=mb_escape($_POST["slovak"]);
                $result = updateKanji($conn,$kanjiID,$kanji_char,$kunyoumi,$onyoumi,$slovak);
                if ($result) {
                    echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne upravené kanji: ' . $kanji_char . '</h2>']);
                } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
            } else http_response_code(400);
        }
    } else echo http_response_code(400);
} else echo http_response_code(400);
