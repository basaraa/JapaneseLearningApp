<?php
include "partials/header.php";
require_once("config/config.php");
include "databaseQueries/databaseQueries.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["subType"])){
    $subType=intval($_GET["subType"]);
    if ($subType >=1 && $subType<17) {
        $result = selectSubTypeWords($conn,$subType);
        echo '<table class="tabulka tabfix" id="tabulka">
                    <thead>
                        <tr>
                            <th>Japonsky
                                <span class="cursor" onclick="zoradenie(0,false,0)"> (x)</span>
                                <span class="cursor" onclick="zoradenie(0,true,0)">(y)</span>
                            </th>
                            <th>Slovensky
                                <span class="cursor" onclick="zoradenie(1,false,0)"> (x)</span>
                                <span class="cursor" onclick="zoradenie(1,true,0)">(y)</span>
                            </th>
                            ';
        echo '                <th>Dátum pridania
                                <span class="cursor" onclick="zoradenie(2,false,1)"> (x)</span>
                                <span class="cursor" onclick="zoradenie(2,true,1)">(y)</span>
                              </th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>';
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row["jap_word"] . '</td>';
                echo '<td>' . $row["svk_word"] . '</td>';
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
    else if ($subType==17){
        echo '<div class="midd">
                  <h2>Ľudské telo:</h2>
                  <img src="/img/postava.png" alt="x">
            </div>';
    }
}
else http_response_code(400);
include ("partials/footer.php");