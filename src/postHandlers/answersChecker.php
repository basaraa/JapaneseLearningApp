<?php
require_once("../config/config.php");
include "../databaseQueries/databaseQueries.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST["language"])){
    $language=$_POST["language"];
    $right_count=0;
    $json_array=[];
    for ($x=1;$x<=10;$x++){
        $answer_string="question".$x;
        $questionId_string="question".$x."_id";
        if (isset($_POST[$questionId_string]) && isset($answer_string)){
            $id=intval($_POST[$questionId_string]);
            $answer=$_POST [$answer_string];
            $result = checkAnswer($conn,$id,$language);
            if ($result){
                $right_answer=mysqli_fetch_assoc($result)["word"];
                if ($answer===$right_answer)
                    $right_count+=1;
                $y=$answer_string."_truth";
                $json_array[$answer_string]=$right_answer;
            }
        }
    }
    $json_array["rightAnswers"]=$right_count;
    echo json_encode($json_array);
    //cho "<h3>Počet správnych odpovedí: $right_count/10</h3>";
}
else echo http_response_code(400);
?>
