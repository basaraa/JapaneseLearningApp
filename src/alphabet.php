<?php
include "partials/header.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["type"])){
    require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
    $type=$_GET["type"];
    if ($type==="hiragana" || $type==="katakana"){
        echo '<table class="tabulka tabfix" id="tabulka"><thead>
                <tr>
                    <th>Znak</th>
                    <th>Slovensky
                        <span onclick="zoradenie(1,false,0)"> (a)</span>
                        <span onclick="zoradenie(1,true,0)">(z)</span>
                    </th>
                </tr>
              </thead>
              <tbody>';
    $result = selectAlphabet($conn,$type);
    if ($result){
        while ($alphabetRow = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td class="kana">'.$alphabetRow["kana"].'</td>
                    <td class="romaji">'.$alphabetRow["romaji"].'</td>
                  </tr>';
        }
    }

        echo '</tbody></table>';
    }
    else if ($type==="kanji"){
        echo '<table class="tabulka tabfix" id="tabulka">
                    <thead>
                        <tr>
                            <th>Kanji</th>
                            <th>Kunyomi(Kana)
                                <span onclick="zoradenie(1,false,0)"> (x)</span>
                                <span onclick="zoradenie(1,true,0)">(y)</span>
                            </th>
                            <th>Onyomi(Kanji)
                                <span onclick="zoradenie(2,false,0)"> (x)</span>
                                <span onclick="zoradenie(2,true,0)">(y)</span>
                            </th>
                        <th>Slovensky
                                <span onclick="zoradenie(3,false,0)"> (x)</span>
                                <span onclick="zoradenie(3,true,0)">(y)</span>
                            </th>
                        </tr>
                    </thead>
              <tbody>';
        $result = selectAlphabet($conn,$type);
        if ($result){
            while ($alphabetRow = mysqli_fetch_assoc($result)) {
				$kanji_char=$alphabetRow["kanji_char"];
				$kanji=mb_substr($kanji_char, 0, 1);
				$odkaz="'$kanji',0";
                echo '<tr class="odkaz" onclick="generateKanjiCombinations('.$odkaz.')">
                    <td class="kana">'.$kanji_char.'</td>
                    <td class="romaji">'.$alphabetRow["kunyoumi"].'</td>
                    <td class="romaji">'.$alphabetRow["onyoumi"].'</td>
                    <td class="romaji">'.$alphabetRow["slovak"].'</td>
                  </tr>';
            }
        }
        echo '</tbody></table>';

    }
    else
        http_response_code(400);
}
else http_response_code(400);

?>
<div id="modal_background"></div>
    <div class="modal_div">
        <div id="modal_vrstva">
            <div id="kanjiCombinations"></div>
            <button class="btn btn-primary" onclick="go_back();">Vrátiť sa späť</button>
        </div>
    </div>
	
	<?
	include "partials/footer.php";
?>
