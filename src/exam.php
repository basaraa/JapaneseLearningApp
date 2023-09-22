<?php
include "partials/header.php";
//test s otázkami
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type"]) && isset ($_POST["subType"])
	&& isset($_POST["questionLanguage"]) && isset($_POST["dateFrom"]) && isset($_POST["dateTo"])){
    require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
	$types=["podstatne meno","pridavne meno","sloveso","all"];
    $type=$_POST["type"];
    $subType=$types[$type] == "podstatne meno" ? intval($_POST["subType"]) : 0;
    $questionLanguage=$_POST["questionLanguage"];
    $answerLanguage = $questionLanguage =="SVK" ? "JP" : "SVK";
	$dateFrom = ($_POST["dateFrom"] == NULL | date('Y-m-d', strtotime($_POST["dateFrom"])) != $_POST["dateFrom"]) ? "1111-01-01" : date('Y-m-d', strtotime($_POST["dateFrom"]));
	$dateTo = ($_POST["dateTo"] == NULL | date('d-m-Y', strtotime($_POST["dateTo"])) != $_POST["dateTo"]) ? "3333-03-03" : date('Y-m-d', strtotime($_POST["dateTo"]));
	if ($dateFrom > $dateTo){
		$x=$dateFrom;
		$dateFrom=$dateTo;
		$dateTo=$x;
	}		 
    $result = selectExamQuestions($conn,$types[$type],$subType,$questionLanguage,$dateFrom,$dateTo);
    if ($result){
        echo '<form class="form exam">';
        $x=1;
        echo '<input type="hidden" name="language" value="'.$answerLanguage.'"></div>';
        while ($question=mysqli_fetch_assoc($result)){
            $id=$question["id"];
            $word=$question["word"];
            $translatedWord=$question["translate"];
            echo '<div class="form-group"><h2 class="blue" id="question'.$x.'">Otázka č.'.$x.' preložte slovo: '.$word.'</h2>';
            $questionWordType=$types[$type] == "all" ? $question["word_type"] : $types[$type];				
			$subresult=selectExamAnswers($conn,$questionWordType,$subType,$answerLanguage,$id);
            $words=[];
            array_push($words,$translatedWord);
            if ($subresult)
            while ($answer=mysqli_fetch_assoc($subresult))
                array_push($words,$answer["word"]);
            shuffle($words);
            foreach($words as $answer)
                echo '<div><input type="radio" class="form-check-input '.$id.' question'.$x.'" name="question'.$x.'" value="'.$answer.'" required>
                        <label class="form-check-label question'.$x.'_label" for="question'.$x.'">'.$answer.'</label>
                        <input type="hidden" name="question'.$x.'_id" value="'.$id.'"></div>';
            echo '</div>';
            $x+=1;
        }
        echo '<button type="submit" class="btn btn-primary">Potvrdiť odpovede</button></div></form>';
		echo '<div id="countAnswer"><h4 class="purple">Počet správnych odpovedí: <span id="countValue"></span>/<span id="maxValue"></span></h4></div>';
    }
    else http_response_code(400);
}
//generovanie formu pre vytvorenie testu
else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getExamForm"]) && $_GET["getExamForm"]==1){
	require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
	?>
	<h3 class="purple">Výber informácii pre generáciu testu</h3><form action="./exam.php" method="POST" class="form">
		<div class="form-group">
			<div>
				<label class="marginx green">Vyber jazyk otázok</label><br>
				<input type="radio" class="form-check-input" name= "questionLanguage" id="JP" value = "JP" required>
				<label class="form-check-label" for="JP">Japončina</label>
			</div>
			<div>
				<input type="radio" class="form-check-input" name= "questionLanguage" id="SVK" value = "SVK" required>
			<label for="SVK">Slovenčina</label>
			</div>
			<label for="type" class="marginx green">Typ pre výber slov:</label>
			<select class="form-control wordType" name= "type" id="type" required>			
				<option value="0" >Podstatné meno</option>
				<option value="1" >Prídavné meno</option>
				<option value="2" >Sloveso</option>
				<option value="3" >Všetky</option>
			</select>
			<label id="nounTypeLabel" for="subType" class="marginx green">Podtyp slova:</label>
			<select class="form-control" name = "subType" id="nounType">
			<?php
				$result = selectNounTypes($conn);
				if ($result) {
					while ($nounType = mysqli_fetch_assoc($result)) {
						$subType = $nounType["type_name"];
						$id = $nounType["id"];
						echo "<option value=$id>$subType</option>";
					}
				}
			?>	
			</select>
			<label class="marginx green">Výber časového limitu pre otázky</label><br>
			<div>
				<label for="dateFrom">od
				<input type="date" class="form-control date" id="dateFrom" name="dateFrom" value="1111-01-01">
				</label>
				<label for="dateTo">do
				<input type="date" class="form-control date" id="dateTo" name="dateTo" value="3333-03-03" ></label>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Generovať test</button>
    </form>
<?php
} else echo http_response_code(400);

include ("partials/footer.php");
?>
