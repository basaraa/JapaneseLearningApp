<?php
include "partials/header.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["type"])){
    require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
    $type=$_GET["type"];
	//kana
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
	//kanji
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
							<th></th>
                        </tr>
                    </thead>
              <tbody>';
        $result = selectAlphabet($conn,$type);
        if ($result){
            while ($alphabetRow = mysqli_fetch_assoc($result)) {
				$kanji_char=$alphabetRow["kanji_char"];
				$kanji=mb_substr($kanji_char, 0, 1);
				$odkaz="'$kanji',0";
				$rowID=$alphabetRow["id"];
                $functionEditForm="'$rowID',3";
                echo '<tr class="odkaz">
                    <td class="kana" onclick="generateKanjiCombinations('.$odkaz.')">'.$kanji_char.'</td>
                    <td class="romaji" onclick="generateKanjiCombinations('.$odkaz.')">'.$alphabetRow["kunyoumi"].'</td>
                    <td class="romaji" onclick="generateKanjiCombinations('.$odkaz.')">'.$alphabetRow["onyoumi"].'</td>
                    <td class="romaji" onclick="generateKanjiCombinations('.$odkaz.')">'.$alphabetRow["slovak"].'</td>
					<td>
						<a class="nodec editWord" onclick= "generateEditForm('.$functionEditForm.')">
                        <i class = "bi bi-pencil-square"></i></a>
                        <a class="nodec deleteX word" id = "' . $rowID . '">
                        <i class = "bi bi-trash"></i></a>
					</td>
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
            <form class="form editForm">
                <div id="modal_text">
                </div>
            </form>
            <button class="btn btn-primary" onclick="go_back();">Vrátiť sa späť</button>
        </div>
    </div>
    <div id="modal_background2"></div>
    <div class="modal_div2">
        <div id="modal_vrstva2">
            <h1 id="result"></h1>
            <button class="btn btn-primary" onclick="window.location.reload()">Vrátiť sa späť</button>
        </div>
    </div>
    <div id="modal_background3"></div>
    <div class="modal_div3">
        <div id="modal_vrstva3">
            <div id="modal_text3">
            </div>
            <button class="btn btn-primary" onclick="go_back2();">Vrátiť sa späť</button>
        </div>
    </div>
	
	<?
	include "partials/footer.php";
?>
