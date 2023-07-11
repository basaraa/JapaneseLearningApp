<?php
include "partials/header.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset ($_GET["showType"])){
    require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
    include "helper/helpFunctions.php";
    $showType=$_GET["showType"];
    if ($showType == 0){
        $result=selectGrammars($conn);
        if ($result){
            while ($grammar=mysqli_fetch_assoc($result)){
                echo_grammar($conn,$grammar);
            }
        }
    }
    if ($showType == 1){
        echo '<table class="tabulka tabfix" id="tabulka">
                    <thead>
                        <tr>
                            <th>Názov gramatiky
                                <span class="cursor" onclick="zoradenie(0,false,0)"> (x)</span>
                                <span class="cursor" onclick="zoradenie(0,true,0)">(y)</span>
                            </th>
                            <th>Popis gramatiky
                                <span class="cursor" onclick="zoradenie(1,false,0)"> (x)</span>
                                <span class="cursor" onclick="zoradenie(1,true,0)">(y)</span>
                            </th>
                            <th></th>
                        </tr>
                    </thead><tbody>';
        $result=selectGrammars($conn);
        if ($result){
            while ($grammar=mysqli_fetch_assoc($result)){
                $grammarID=$grammar["id"];
				$functionEditForm="'$grammarID',1";
                echo '<tr >';
                echo '<td class="odkaz" onclick="window.location.href=\'grammar.php?showType=2&grammarID='.$grammarID.' \'">' . $grammar["grammar_title"] . '</td>';
                echo '<td class="odkaz" onclick="window.location.href=\'grammar.php?showType=2&grammarID='.$grammarID.' \'">' . $grammar["grammar_description"] . '</td>';
                echo '<td><a class="nodec editWord" onclick= "generateEditForm('.$functionEditForm.')">
                        <i class = "bi bi-pencil-square"></i></a>
                        <a class="nodec deleteX grammar" id = "' . $grammarID . '">
                        <i class = "bi bi-trash"></i></a></td>';
				echo '</tr>';
            }
        }
        echo '</tbody></table>';
    }
    if ($showType == 2 && isset($_GET["grammarID"])){
        $grammarID=intval($_GET["grammarID"]);
        $result=selectGrammarByID($conn,$grammarID);
        if ($result){
            $grammar=mysqli_fetch_assoc($result);
            echo_grammar($conn,$grammar);
        }
    }
    else http_response_code(400);
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
?>