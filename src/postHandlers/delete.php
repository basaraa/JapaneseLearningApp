<?php
require_once("../config/config.php");
include "../databaseQueries/databaseQueries.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset ($_POST["id"]) && isset ($_POST["type"])){
        $id=intval($_POST["id"]);
        $type=intval($_POST["type"]);
        if ($type==0)
            $result = deleteWord($conn,$id);
        else
            $result = deleteGrammar($conn,$id);
        if($result)
        {
            echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne vymazanie</h2>']);
        }
        else {
            echo json_encode(["scs" => false, "msg" => '<h2 class="red">Zlyhanie vymazávania</h2>']);
        }
    } else echo http_response_code(400);
} else echo http_response_code(400);
?>
