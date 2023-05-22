<?php
include "partials/header.php";
require_once("config/config.php");
include "databaseQueries/databaseQueries.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["type"]) && isset ($_GET["subType"]) && isset($_GET["questionLanguage"])){
    $type=$_GET["type"];
    $subType=intval($_GET["subType"]);
    $questionLanguage=$_GET["questionLanguage"];
    $answerLanguage = $questionLanguage =="SVK" ? "JP" : "SVK";
    $types=["podstatne meno","pridavne meno","sloveso","ostatne"];
    $result = selectExamQuestions($conn,$types[$type],$subType,$questionLanguage);
    if ($result){
        echo '<form class="form exam">';
        $x=1;
        echo '<input type="hidden" name="language" value="'.$answerLanguage.'"></div>';
        while ($question=mysqli_fetch_assoc($result)){
            $id=$question["id"];
            $word=$question["word"];
            $translatedWord=$question["translate"];
            echo '<div class="form-group"><h2 class="blue">Otázka č.'.$x.' preložte slovo: '.$word.'</h2>';
            $subresult=selectExamAnswers($conn,$types[$type],$subType,$answerLanguage,$id);
            $words=[];
            array_push($words,$translatedWord);
            if ($subresult)
            while ($answer=mysqli_fetch_assoc($subresult))
                array_push($words,$answer["word"]);
            shuffle($words);
            foreach($words as $answer)
                echo '<div><input type="radio" class="form-check-input '.$id.'" name="question'.$x.'" value='.$answer.' required>
                        <label class="form-check-label" for="question'.$x.'">
                        '.$answer.'
                        </label>
                        <input type="hidden" name="question'.$x.'_id" value="'.$id.'"></div>';
            echo '</div>';
            $x+=1;
        }
        echo '<button type="submit" class="btn btn-primary">Potvrdiť odpovede</button></div></form>';
    }
    else http_response_code(400);
}
else echo http_response_code(400);
?>
<div id="modal_background"></div>
<div class="modal_div">
    <div id="modal_vrstva">
        <h1 id="modal_text"></h1>
        <button class="btn btn-primary" onclick="window.location.href='index.php'">Späť na hlavnú stránku</button>
    </div>
</div>
<?php
include ("partials/footer.php");
?>
