<?php
include "partials/header.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["type"]) && isset ($_GET["showType"])){
    require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
    include "helper/helpFunctions.php";
    $type=intval($_GET["type"]);
    $showType=intval($_GET["showType"]);
    $types=["podstatne meno","pridavne meno","sloveso","all"];
    if ($type>=0 && $type<=4) {
        $orderColumns=["jap_word","svk_word","word_type","word_subtype_id","day_of_addition"];
        $orders=["ASC","DESC"];
        $orderColumn=(isset($_GET["orderColumn"])&&in_array($_GET["orderColumn"],$orderColumns)) ? mb_escape($_GET["orderColumn"]) : "jap_word";
        $order=(isset($_GET["order"])&&in_array($_GET["order"],$orders)) ? mb_escape($_GET["order"]) : "ASC";
        if ($showType!=2)
            $result = selectWords($conn, $types[$type],$orderColumn,$order);
        //zoznam
        if ($showType == 0) {
            $x = 3;
            echo '<table class="tabulka tabfix" id="tabulka">
                    <thead>
                        <tr>
                            <th>Japonsky
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=jap_word&order=ASC\'"> (x)</span>
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=jap_word&order=DESC\'"> (x)</span>
                            </th>
                            <th>Slovensky
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=svk_word&order=ASC\'"> (x)</span>
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=svk_word&order=DESC\'"> (x)</span>
                            </th>
                            <th>Typ
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=word_type&order=ASC\'"> (x)</span>
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=word_type&order=DESC\'"> (x)</span>
                            </th>
                            ';
            if ($type === 0) {
                echo '          <th>Podtyp
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=word_subtype_id&order=ASC\'"> (x)</span>
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=word_subtype_id&order=DESC\'"> (x)</span>
                            </th>';
                $x = 4;
            }
            echo '                <th>Dátum pridania
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=day_of_addition&order=ASC\'"> (x)</span>
                                <span class="cursor" onclick="window.location.href=\'words.php?type='.$type.'&showType='.$showType.'&orderColumn=day_of_addition&order=DESC\'"> (x)</span>
                              </th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>';

            if (isset($result) && $result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    if ($type==2 && !(str_contains($row["jap_word"], ' ')))
                        echo '<td><a class="cursor" onclick="window.location.href=\'verbForms.php?verb='.$row["jap_word"].'&getVerbForms=8\'">' . $row["jap_word"] . '</a></td>';
                    else
                        echo '<td>' . $row["jap_word"] . '</td>';
                    echo '<td>' . $row["svk_word"] . '</td>';
                    echo '<td>' . $row["word_type"] . '</td>';
                    if ($type === 0) {
                        echo '<td>' . $row["type_name"] . '</td>';
                    }
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
        else if ($showType == 1 && isset($_GET["frontLanguage"])){
            $frontLanguage=mb_escape($_GET["frontLanguage"]);
            if (isset($result) && $result) {
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
                        echo ''.$row ["svk_word"].'</div></div><div class="flip-card-back">';
                        echo ''.$row["jap_word"].'</div></div></div></div>';
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
                    echo '<div class="inflexdiv" onclick="location.href=\'nounTypeWords.php?subType='.$nounTypeId.'&showType=0\'">                            
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