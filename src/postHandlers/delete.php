<?php
require_once("../config/config.php");
include "../databaseQueries/databaseQueries.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset ($_POST["id"])){
        $id=intval($_POST["id"]);
        $result = deleteWord($conn,$id);
        if($result)
        {
            echo json_encode(["scs" => true, "msg" => '<h2 class="blue">Úspešne vymazané slovo</h2>']);
        }
        else {
            echo json_encode(["scs" => false, "msg" => '<h2 class="red">Zlyhanie vymazávania slova</h2>']);
        }
    } else echo http_response_code(400);
} else echo http_response_code(400);
?>
