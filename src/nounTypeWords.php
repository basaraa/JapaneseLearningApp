<?php
include "partials/header.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["subType"]) && (isset($_GET["showType"]))){
    require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
    include "helper/helpFunctions.php";
    $subType=intval($_GET["subType"]);	
    if ($subType >=1 && $subType<50) {
        $showType=$_GET["showType"];
        echo '<div>
<button class="btn btn-primary" onclick="window.location.href=\'nounTypeWords.php?showType=1&frontLanguage=SVK&subType='.$subType.'\'" >Kartičky SVK->JP</button>
<button class="btn btn-primary" onclick="window.location.href=\'nounTypeWords.php?showType=1&frontLanguage=JP&subType='.$subType.'\'">Kartičky JP->SVK</button></div>';
		if ($subType==17){
			echo '<div class="midd">
					  <h2>Ľudské telo:</h2>
					  <img src="/img/postava.png" alt="x">
				</div>';
		}
        $result = selectSubTypeWords($conn,$subType);
		//zoznam
        if ($showType==0) {
			echo '<label class="purple">Vyhľadaj slovo:</label><input type="text" class="form-control" id="searchBar">';
            echo '<table class="tabulka tabfix" id="tabulka">
                    <thead>
                        <tr>
                            <th>Japonsky
                                <i class="cursor bi bi-sort-up" onclick="zoradenie(0,false,0)"></i>
                                <i class="cursor bi bi-sort-down" onclick="zoradenie(0,true,0)"></i>
                            </th>
                            <th>Slovensky
                                <i class="cursor bi bi-sort-up" onclick="zoradenie(1,false,0)"></i>
                                <i class="cursor bi bi-sort-down" onclick="zoradenie(1,true,0)"></i>
                            </th>
							<th>Kanji</th>
                            ';
            echo '                <th>Dátum pridania
                                <i class="cursor bi bi-sort-up" onclick="zoradenie(2,false,1)"></i>
                                <i class="cursor bi bi-sort-down" onclick="zoradenie(2,true,1)"></i>
                              </th>
							  
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>';
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td class="searchedValue">' . $row["jap_word"] . '</td>';
                    echo '<td class="searchedValue">' . $row["svk_word"] . '</td>';
					$kanji = $row["kanji"] == NULL ? '' : $row["kanji"];
					echo '<td>' .$kanji. '</td>';
                    echo '<td>' . date("d.m.Y", strtotime($row["day_of_addition"])) . '</td>';
                    $rowID=$row["id"];
                    $functionEditForm="'$rowID',0";
                    echo '<td><a class="nodec editWord" onclick= "generateEditForm('.$functionEditForm.')">
                        <i class = "bi bi-pencil-square"></i></a>
                        <a class="nodec deleteX word" id = "' . $rowID . '">
                        <i class = "bi bi-trash"></i></a></td>';
                    echo '</tr>';
                }
            }
            echo '</tbody></table>';
        }
        //kartičky
        else if ($showType==1 && isset($_GET["frontLanguage"])){
            $frontLanguage=mb_escape($_GET["frontLanguage"]);
            if ($result) {
                echo '<div class="flexdiv">';
                if ($frontLanguage == "JP") {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="flip-card inflexdiv-cards"><div class="flip-card-inner"><div class="flip-card-front"><div class="centered">';
                        echo ''.$row ["jap_word"].'</div></div><div class="flip-card-back"><div class="centered">';
                        echo ''.$row["svk_word"].'</div></div></div></div>';
                    }
                }
                else{
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="flip-card inflexdiv-cards"><div class="flip-card-inner"><div class="flip-card-front"><div class="centered">';
                        echo ''.$row ["svk_word"].'</div></div><div class="flip-card-back"><div class="centered">';
                        echo ''.$row["jap_word"].'</div></div></div></div>';
                    }
                }
                echo '</div>';
            }
            else http_response_code(400);
        }
        else http_response_code(400);
    }    
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
<?php
include ("partials/footer.php");
