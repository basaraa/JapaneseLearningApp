<?php
include "partials/header.php";
require_once("config/config.php");
include "databaseQueries/databaseQueries.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["type"]) && isset ($_GET["showType"])){
    $type=intval($_GET["type"]);
    $showType=intval($_GET["showType"]);
    $types=["podstatne meno","pridavne meno","sloveso","ostatne","all"];
    if ($type>=0 && $type<=4) {
        if ($showType!=2)
            $result = selectWords($conn, $types[$type]);
        //zoznam
        if ($showType == 0) {
            $x = 3;
            echo '<table class="tabulka tabfix" id="tabulka">
                    <thead>
                        <tr>
                            <th>Japonsky
                                <span onclick="zoradenie(0,false,0)"> (x)</span>
                                <span onclick="zoradenie(0,true,0)">(y)</span>
                            </th>
                            <th>Slovensky
                                <span onclick="zoradenie(1,false,0)"> (x)</span>
                                <span onclick="zoradenie(1,true,0)">(y)</span>
                            </th>
                            <th>Typ
                                <span onclick="zoradenie(2,false,0)"> (x)</span>
                                <span onclick="zoradenie(2,true,0)">(y)</span>
                            </th>
                            ';
            if ($type === 0) {
                echo '          <th>Podtyp
                                <span onclick="zoradenie(3,false,0)"> (x)</span>
                                <span onclick="zoradenie(3,true,0)">(y)</span>
                            </th>';
                $x = 4;
            }
            echo '                <th>Dátum pridania
                                <span onclick="zoradenie(' . $x . ',false,1)"> (x)</span>
                                <span onclick="zoradenie(' . $x . ',true,1)">(y)</span>
                              </th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>';

            if (isset($result) && $result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row["jap_word"] . '</td>';
                    echo '<td>' . $row["svk_word"] . '</td>';
                    echo '<td>' . $row["word_type"] . '</td>';
                    if ($type === 0) {
                        echo '<td>' . $row["type_name"] . '</td>';
                    }
                    echo '<td>' . date("d.m.Y", strtotime($row["day_of_addition"])) . '</td>';
                    echo '<td><a class="nodec" href="edit_form.php?idcko=' . $row["id"] . '">
                        <i class = "bi bi-pencil-square"></i></a>
                        <a class="nodec" href="delete.php?idcko=' . $row["id"] . '">
                        <i class = "bi bi-trash"></i></a></td>';
                    echo '</tr>';
                }
            }
            echo '</tbody></table>';
        }
        //kartičky
        else if ($showType == 1 && isset($_GET["frontLanguage"])){
            $frontLanguage=$_GET["frontLanguage"];
            if (isset($result) && $result) {
                echo '<div class="flexdiv">';
                if ($frontLanguage == "JP") {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="flip-card inflexdiv-cards"><div class="flip-card-inner"><div class="flip-card-front">';
                        echo ''.$row ["jap_word"].'</div><div class="flip-card-back">';
                        echo ''.$row["svk_word"].'</div></div></div>';
                    }
                }
                else{
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="flip-card inflexdiv-cards"><div class="flip-card-inner"><div class="flip-card-front">';
                        echo ''.$row ["svk_word"].'</div><div class="flip-card-back">';
                        echo ''.$row["jap_word"].'</div></div></div>';
                    }
                }
                echo '</div>';
            }
            else http_response_code(400);
        }
        //zoznam kategórii podstatných mien
        else if ($showType == 2 && $type==0){
            $result=selectNounTypes($conn);
            if ($result){
                echo '<div class="flexdiv">';
                while ($row=mysqli_fetch_assoc($result)){
                    $nounTypeName=$row["type_name"];
                    $nounTypeId=$row["id"];
                    echo '<div class="inflexdiv" onclick="location.href=\'nounSubTypeWords.php?subType='.$nounTypeId.'\'">                            
                            <img src="img/nounTypes/'.$row["image_name"].'" class="imgx" alt="x">
                            <h2>'.$nounTypeName.'</h2>
                          </div>';
                }
                echo '</div>';
            }

        }
    }
    else http_response_code(400);
}
else http_response_code(400);
include ("partials/footer.php");