<?php
include "partials/header.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset ($_GET["verb"]) && isset ($_GET["getVerbForms"])){
    $x=intval($_GET["getVerbForms"]);
    if ($x==8){
        $getVerb=$_GET["verb"];
        $verb=preg_replace('!\(([^)]+)\)!',"", $getVerb);
        $home = file_get_contents('https://www.japaneseverbconjugator.com/VerbDetails.asp?txtVerb='.strtolower($verb).'&VerbClass=1');
        if (str_contains($home, "alert-danger")){
            preg_match('~<table class="table table-bordered"(.*?)</table>~Usi',$home,$home);
            $home=preg_replace('%(<div class="modal-body">.*?</div>)%sim',"",$home[0]);
            $home=preg_replace('%(<div.*?id="PassiveModal".*?>.*?</div>)%sim',"",$home);
            echo "<div class='half'>";
            print_r($home);
            echo "</div>";
        }
        else
            echo "<h1>Nepodarilo sa nájsť formy pre sloveso</h1>";
    }
    else echo http_response_code(400);
}
else echo http_response_code(400);
include("partials/footer.php");
