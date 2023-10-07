<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kanji"]) && count($_POST)==1){
    require_once("../config/config.php");
    include "../databaseQueries/databaseQueries.php";
    include "../helper/helpFunctions.php";
	$kanji=mb_escape($_POST["kanji"]);
	$result=selectKanjiCombinations($conn,$kanji);
	if ($result){
		echo '<table class="tabulka tabfix" id="tabulka">
                    <thead>
                        <tr>
                            <th>Kanji</th>
                            <th>Romaji(Kana)
                                <span onclick="zoradenie(1,false,0)"> (x)</span>
                                <span onclick="zoradenie(1,true,0)">(y)</span>
                            </th>
                            <th>Preklad(Kanji)
                                <span onclick="zoradenie(2,false,0)"> (x)</span>
                                <span onclick="zoradenie(2,true,0)">(y)</span>
                            </th>
                        </tr>
                    </thead>
              <tbody>';
		while ($row = mysqli_fetch_assoc($result)) {	
			echo '<tr>
                    <td class="kana">'.$row["kanji"].'</td>
                    <td class="romaji">'.$row["jap_word"].'</td>
                    <td class="romaji">'.$row["svk_word"].'</td>
                  </tr>';	  
		}
	}
}
ELSE http_response_code(400);