<?php
require_once("../config/config.php");
include "../databaseQueries/databaseQueries.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["addType"])){
        $addType=intval($_POST["addType"]);
        if ($addType == 0 || $addType == 1) {
            if (isset ($_FILES["fileCSV"]["tmp_name"])) {
                $file_name=$_FILES["fileCSV"]["tmp_name"];
                $opened_file = fopen ($file_name,"r");
                $types=["podstatne meno","pridavne meno","sloveso","ostatne"];
                $nounTypesRows=0;
                $result=selectNounTypes($conn);
                if ($result)
                    $nounTypesRows=(int)$result->num_rows;
                $msg='';
                while ($line=fgetcsv($opened_file,80)){
                    $result=null;
                    if ($addType == 0){
                        if ((isset ($line[0]) && strlen ($line[0])<=64) && (isset ($line[1]) && strlen ($line[1])<=128)
                            && (isset ($line[2]) && in_array($line[2],$types)) && isset ($line[3])){
                            if (($line[2]!="podstatne meno") ||
                                ($line[2]==="podstatne meno" && (intval($line[3])>0 && intval($line[3])<=$nounTypesRows))){
                                $japWord = $line[0];
                                $svkWord = $line[1];
                                $type = $line[2];
                                $nounType = $type=="podstatne meno" ? intval($line[3]) : '';
                                $result = insertWord($conn, $japWord,$svkWord,$type,$nounType);
                                $msg.=$japWord.', ';
                            }
                        }
                    }
                }
                if (!empty($msg)){
                    $msg = "<h2 class='blue'>Úspešne pridané: ".$msg."</h2>";
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
