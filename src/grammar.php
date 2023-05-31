<?php
include "partials/header.php";
require_once("config/config.php");
include "databaseQueries/databaseQueries.php";
include "helper/helpFunctions.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset ($_GET["showType"])){
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
                        </tr>
                    </thead><tbody>';
        $result=selectGrammars($conn);
        if ($result){
            while ($grammar=mysqli_fetch_assoc($result)){
                $grammarID=$grammar["id"];
                echo '<tr class="odkaz" onclick="window.location.href=\'grammar.php?showType=2&grammarID='.$grammarID.' \'">';
                echo '<td>' . $grammar["grammar_title"] . '</td>';
                echo '<td>' . $grammar["grammar_description"] . '</td>';
                echo '</tr>';
            }
        }
    }
    if ($showType == 2 && isset($_GET["grammarID"])){
        $grammarID=intval($_GET["grammarID"]);
        $result=selectGrammarByID($conn,$grammarID);
        if ($result){
            $grammar=mysqli_fetch_assoc($result);
            echo_grammar($conn,$grammar);
        }
    }
}
include ("partials/footer.php");