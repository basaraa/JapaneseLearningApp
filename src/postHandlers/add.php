<?php
require_once("../config/config.php");
include "../databaseQueries/databaseQueries.php";
include "../helper/helpFunctions.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //word/sentence
    if (isset($_POST["addType"])) {
        $addType=intval($_POST["addType"]);
        if ($addType == 0) {
            if (isset($_POST["japWord"]) && isset($_POST["svkWord"]) && isset($_POST["type"]) && isset($_POST["nounType"]) && isset($_POST["kanji"])) {
                $japWord = mb_escape($_POST["japWord"]);
                $svkWord = mb_escape($_POST["svkWord"]);
                $type = mb_escape($_POST["type"]);
                $nounType = $type=="podstatne meno" ? intval($_POST["nounType"]) : '';
				$kanji = $_POST["kanji"] == NULL ? '': mb_escape($_POST["kanji"]);
                $type=mb_escape($type);
                $checkJapWord = selectWordByName($conn, $japWord);
                if ($checkJapWord && ($checkJapWord->num_rows) === 0) {
                    $result = insertWord($conn, $japWord,$svkWord,$type,$nounType,$kanji);
                    if ($result) {
                        echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne pridané slovo: ' . $japWord . '</h2>']);
                    } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
                } else
                    echo json_encode(["scs" => false, "msg" => '<h2 class="red">Slovo: ' . $japWord . ' už existuje</h2>']);
            } else http_response_code(400);
        }
        //grammar
        else if ($addType == 1) {
            if (isset($_POST["grammarTitle"]) && isset($_POST["grammarDescription"])) {
                $grammarTitle = mb_escape($_POST["grammarTitle"]);
                $grammarDescription = mb_escape($_POST["grammarDescription"]);
                $checkGrammar = selectGrammarByTitle($conn, $grammarTitle);
                if ($checkGrammar && ($checkGrammar->num_rows) === 0) {
                    $result = insertGrammar($conn, $grammarTitle,$grammarDescription);
                    if ($result) {
                        echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne pridaná gramatika s názvom: ' . $grammarTitle . '</h2>']);
                    } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
                } else
                    echo json_encode(["scs" => false, "msg" => '<h2 class="red">Gramatika s názvom: ' . $grammarTitle . ' už existuje</h2>']);
            }
        }
        //grammarSentence
        else if ($addType == 2) {
            if (isset($_POST["grammarID"]) && isset($_POST["grammarJapSentence"]) && isset($_POST["grammarSvkSentence"])) {
                $grammarTitleID = intval($_POST["grammarID"]);
                $grammarJapSentence = mb_escape($_POST["grammarJapSentence"]);
                $grammarSvkSentence = mb_escape($_POST["grammarSvkSentence"]);
                $result = insertGrammarSentence($conn,$grammarTitleID,$grammarJapSentence,$grammarSvkSentence);
                if ($result) {
                    echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne pridaná veta: ' . $grammarJapSentence . '</h2>']);
                } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
            }
        }
        //kanji
        else if ($addType == 3) {
            if (isset($_POST["kanji"]) && isset($_POST["kunyoumi"]) && isset($_POST["onyoumi"]) && isset($_POST["slovak"])) {
                $kanji = mb_escape($_POST["kanji"]);
                $kunyoumi = mb_escape($_POST["kunyoumi"]);
                $onyoumi = mb_escape($_POST["onyoumi"]);
                $slovak = mb_escape($_POST["slovak"]);
                $result = insertKanji($conn,$kanji,$kunyoumi,$onyoumi,$slovak);
                if ($result) {
                    echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne pridané kanji: ' . $kanji . '</h2>']);
                } else echo json_encode(["scs" => false, "msg" => '<h2 class="red">' . $conn->error . '</h2>']);
            }
        }
        else http_response_code(400);
    }

    else http_response_code(400);
}
