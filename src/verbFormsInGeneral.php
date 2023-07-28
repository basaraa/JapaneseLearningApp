<?php
include "partials/header.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET["showType"]))){
    require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
    include "helper/helpFunctions.php";
    $showType=intval($_GET["showType"]);	
    if ($showType==0) {
        $result = selectVerbFormOrigins($conn);
        $previousType='';
        $i=0;
        if ($result) {
            $origins=[];
            echo '<ul class="verbFormTableHide flexdiv">';
            while ($originRow = mysqli_fetch_assoc($result)) {
                $origin = $originRow["origin"];
                echo '<li class="verbFormTableHideLi inflexdiv" id="'.$origin.'_li">'.$origin.'</li>';
                array_push($origins, $origin);
            }
            echo '</ul>';
            foreach ($origins as $origin){
                if ($i===0){
                    echo '<div class="verbFormTableDiv" id = '.$origin.' style="display:block"><h4 class="purple h4Place">Forma pre slovesa končiace s príponou "'.$origin.'" sa nahradia za nasledovné prípony z tabuľky:</h4>';
                    $i=1;
                }
                else
                    echo '<div class="verbFormTableDiv" id = '.$origin.' style="display:none"><h4 class="purple h4Place">Forma pre slovesa končiace s príponou "'.$origin.'" sa nahradia za nasledovné prípony z tabuľky:</h4>';

                echo '<table class="tabulka tabfix verbFormsInGeneral">
                    <thead>
                        <tr>
                            <th>Typ formy
                                <span class="cursor" onclick="zoradenie(0,false,0)"> (x)</span>
                                <span class="cursor" onclick="zoradenie(0,true,0)">(y)</span>
                            </th>
                            <th>Neformálne
                                <span class="cursor" onclick="zoradenie(1,false,0)"> (x)</span>
                                <span class="cursor" onclick="zoradenie(1,true,0)">(y)</span>
                            </th>
                             <th>Formálne
                                <span class="cursor" onclick="zoradenie(2,false,1)"> (x)</span>
                                <span class="cursor" onclick="zoradenie(2,true,1)">(y)</span>
                              </th>
                         </tr>
                    </thead>
                    <tbody>';
                $resultForms = selectVerbFormByOrigins($conn,$origin);
                if ($resultForms) {
                    while ($row = mysqli_fetch_assoc($resultForms)) {
                        $formSuffix = $row["form_suffix"];
                        $firstFormSuffix = '';
                        $secondFormSuffix = '';
                        if ($formSuffix != NULL){
                            $splitedSuffixes = explode ("/", $formSuffix);
                            $firstFormSuffix = isset($splitedSuffixes[0]) ? $splitedSuffixes[0] : $formSuffix;
                            $secondFormSuffix = isset($splitedSuffixes[1]) ? $splitedSuffixes[1] : '';
                        }
                        $formTypeName=$row["form_name"];
                        echo '<tr>';
                        echo '<td>' . $formTypeName . '</td>';
                        echo '<td>' . $firstFormSuffix . '</td>';
                        echo '<td>' . $secondFormSuffix . '</td>';
                        echo '</tr>';
                    }
                }
                echo '</tbody></table></div>';
            }
        }
    } else http_response_code(400);   
} else http_response_code(400);
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
