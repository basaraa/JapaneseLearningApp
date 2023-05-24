<?php
require_once("../config/config.php");
include "../databaseQueries/databaseQueries.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //word/sentence
    if (isset($_POST["addType"])) {
        $addType=intval($_POST["addType"]);
        if ($addType == 0) {
            if (isset($_POST["japWord"]) && isset($_POST["svkWord"]) && isset($_POST["type"]) && isset($_POST["nounType"])) {
                $japWord = $_POST["japWord"];
                $svkWord = $_POST["svkWord"];
                $type = $_POST["type"];
                $nounType = $type=="podstatne meno" ? intval($_POST["nounType"]) : '';
                $checkJapWord = selectWordByName($conn, $japWord);
                if ($checkJapWord && ($checkJapWord->num_rows) === 0) {
                    $result = insertWord($conn, $japWord,$svkWord,$type,$nounType);
                    if ($result) {
                        echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne pridané slovo: ' . $japWord . '</h2>']);
                    } else http_response_code(400);
                } else
                    echo json_encode(["scs" => false, "msg" => '<h2 class="red">Slovo: ' . $japWord . ' už existuje</h2>']);
            } else http_response_code(400);
        }
        //grammar
        else if ($addType == 1) {
        }
        else http_response_code(400);
    }

    else http_response_code(400);
}
