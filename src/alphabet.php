<?php
include "partials/header.php";
require_once("config/config.php");
include "databaseQueries/databaseQueries.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["type"])){
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
                            <th>Kunyoumi(Kana)
                                <span onclick="zoradenie(1,false,0)"> (x)</span>
                                <span onclick="zoradenie(1,true,0)">(y)</span>
                            </th>
                            <th>Onyoumi(Kanji)
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
                echo '<tr>
                    <td class="kana">'.$alphabetRow["kanji_char"].'</td>
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

include "partials/footer.php";

