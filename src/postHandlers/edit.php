<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../config/config.php");
    include "../databaseQueries/databaseQueries.php";
    include "../helper/helpFunctions.php";
    if (isset($_POST["editType"])) {
        $editType = intval($_POST["editType"]);
        //word/sentence
        if ($editType == 0) {
            if (isset($_POST["wordID"]) && isset($_POST["japWord"])  && isset($_POST["svkWord"])
                && isset($_POST["type"]) && isset($_POST["nounType"])) {
                $japWord = mb_escape($_POST["japWord"]);
                $svkWord = mb_escape($_POST["svkWord"]);
                $wordID= intval($_POST["wordID"]);
                $type = $_POST["type"];
                $nounType = $type == "podstatne meno" ? intval($_POST["nounType"]) : '';
                $type = mb_escape($type);
                $checkJapWord = selectWordByNameCheckDuplicate($conn, $japWord,$wordID);
                if ($checkJapWord && ($checkJapWord->num_rows) === 0) {
                    $result = updateWord($conn,$wordID, $japWord, $svkWord, $type, $nounType);
                    if ($result) {
                        echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne upravené slovo: ' . $japWord . '</h2>']);
                    } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
                } else
                    echo json_encode(["scs" => false, "msg" => '<h2 class="red">Slovo: ' . $japWord . ' existuje</h2>']);
            } else http_response_code(400);
        }
    } else echo http_response_code(400);
} else echo http_response_code(400);
