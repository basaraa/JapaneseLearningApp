<?php
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["id"]) && isset($_POST["type"])){
    require_once("../config/config.php");
    include "../databaseQueries/databaseQueries.php";
    include "../helper/helpFunctions.php";
    $type=$_POST["type"];
    $id=intval($_POST["id"]);
    //word
    if ($type==0){
        $result = selectWordByID($conn,$id);
        if ($result){
            $wordRow=mysqli_fetch_assoc($result);
            $japWord=htmlspecialchars($wordRow["jap_word"]);
            $svkWord=htmlspecialchars($wordRow["svk_word"]);
            $wordType=$wordRow["word_type"];
            $types=["podstatne meno","pridavne meno","sloveso","ostatne"];
            $typesString=["Podstatné meno","Prídavné meno","Sloveso","Ostatné"];
			$kanji_char=$wordRow["kanji"]==NULL ? '' : htmlspecialchars($wordRow["kanji"]);
            if ($wordType==$types[0])
                $wordSubTypeID=$wordRow["word_subtype_id"];
            else
                $wordSubTypeID=NULL;
            echo '		<input type="hidden" id="editType" name="editType" value = "' . $type . '">
                        <input type="hidden" id="wordID" name="wordID" value = "' . $id . '">
                        <label for="japWord">Japonské slovo:</label>
                        <input type="text" class="form-control" name= "japWord" id="japWord" placeholder="Zadajte japonské slovo" 
                         value="'.$japWord.'" maxlength="64" required>
                        <label for="svkWord">Preklad:</label>
                        <input type="text" class="form-control" name= "svkWord" id="svkWord" placeholder="Zadajte preklad"
                         value="'.$svkWord.'" maxlength="128" required>
                        <label for="type">Typ slova:</label>
                        <select class="form-control wordType" name= "type" id="type" required>                          
                    ';
            for ($x=0;$x<count($types);$x++){
                if ($types[$x]==$wordType)
                    echo '<option value="'.$types[$x].'" selected>'.$typesString[$x].'</option>';
                else
                    echo '<option value="'.$types[$x].'" >'.$typesString[$x].'</option>';
            }
            echo '</select>';
            if ($wordSubTypeID)
                echo '<label id="nounTypeLabel" for="nounType">Podtyp slova:</label>
                    <select class="form-control" name = "nounType" id="nounType">';
            else
                echo '<label id="nounTypeLabel" for="nounType" style="display: none">Podtyp slova:</label>
                    <select class="form-control" name = "nounType" id="nounType" style="display: none">';
            $resultNounTypes=selectNounTypes($conn);
            if ($resultNounTypes) {
                while ($nounType = mysqli_fetch_assoc($resultNounTypes)) {
                    $subType = $nounType["type_name"];
                    $subTypeID = $nounType["id"];
                    if ($wordSubTypeID && $subTypeID==$wordSubTypeID)
                        echo "<option value=$subTypeID selected>$subType</option>";
                    else
                        echo "<option value=$subTypeID>$subType</option>";
                }
            }
            echo '</select><label for="kanji">Znak kanji:</label>
						<input type="text" class="form-control" name= "kanji" id="kanji" placeholder="Zadajte kanji znak" maxlength="16" value="'.$kanji_char.'">
					</div>
                    <button type="submit" class="btn btn-primary">Upraviť slovo</button>';
        } else echo '<h2 class="red">Slovo sa nenašlo</h2>';
    }
	//grammar
    else if ($type==1){
		$result = selectGrammarByID($conn,$id);
        if ($result){
            $grammar=mysqli_fetch_assoc($result);
			$grammarTitle=htmlspecialchars($grammar["grammar_title"]);
			$grammarDescription=htmlspecialchars($grammar["grammar_description"]);
            echo '		<input type="hidden" id="editType" name="editType" value = "' . $type . '">
                        <input type="hidden" id="grammarID" name="grammarID" value = "' . $id . '">
                        <label for="japWord">Názov gramatiky:</label>
                        <input type="text" class="form-control" name= "grammarTitle" id="grammarTitle" placeholder="Zadajte názov gramatiky" 
                         value="'.$grammarTitle.'" maxlength="64" required>
                        <label for="svkWord">Preklad:</label>
                        <input type="text" class="form-control" name= "grammarDescription" id="grammarDescription" placeholder="Zadajte popis gramatiky"
                         value="'.$grammarDescription.'" maxlength="256" required>
                        <label>Zoznam viet:</label>';
            $resultSentences=selectSentencesByGrammarID($conn,$id);
            if ($resultSentences && $resultSentences->num_rows>0) {
                while ($sentence = mysqli_fetch_assoc($resultSentences)) {
                    $sentenceID=$sentence["id"];
                    $japSentence=$sentence["jap_sentence"];
                    $svkSentence=$sentence["svk_sentence"];
                    echo '<div><label for="'.$id.'" class="purple"><input type="checkbox" name="sentences[]" value="'.$sentenceID.'" id="'.$sentenceID.'" checked> '.$japSentence.' - '.$svkSentence.'</input></label></div>';
                }
            }
            echo '</select></div>
                    <button type="submit" class="btn btn-primary">Upraviť gramatiku</button>';
        } else echo '<h2 class="red">Gramatika sa nenašla</h2>';
    }
    //grammar sentence
    else if ($type==2){
        $result = selectGrammarSentenceByID($conn,$id);
        if ($result){
            $sentence=mysqli_fetch_assoc($result);
            $sentenceJap=htmlspecialchars($sentence["jap_sentence"]);
            $sentenceSvk=htmlspecialchars($sentence["svk_sentence"]);
            echo '		<input type="hidden" id="editType" name="editType" value = "' . $type . '">
                        <input type="hidden" id="sentenceID" name="sentenceID" value = "' . $id . '">
                        <label for="japWord">Veta po japonsky:</label>
                        <input type="text" class="form-control" name= "sentenceJap" id="sentenceJap" placeholder="Zadajte vetu po japonsky" 
                         value="'.$sentenceJap.'" maxlength="128" required>
                        <label for="svkWord">Preklad:</label>
                        <input type="text" class="form-control" name= "sentenceSvk" id="sentenceSvk" placeholder="Zadajte vetu po slovensky"
                         value="'.$sentenceSvk.'" maxlength="128" required>';
            echo '</div>
                    <button type="submit" class="btn btn-primary">Upraviť vetu</button>';
        } else echo '<h2 class="red">Veta ku gramatike sa nenašla</h2>';
    }
	//kanji
	else if ($type==3){
        $result = selectKanjiByID($conn,$id);
        if ($result){
            $kanji=mysqli_fetch_assoc($result);
            $kanji_char=htmlspecialchars($kanji["kanji_char"]);
            $kunyoumi=htmlspecialchars($kanji["kunyoumi"]);
			$onyoumi=htmlspecialchars($kanji["onyoumi"]);
			$slovak=htmlspecialchars($kanji["slovak"]);
            echo '		<input type="hidden" id="editType" name="editType" value = "' . $type . '">
                        <input type="hidden" id="kanjiID" name="kanjiID" value = "' . $id . '">
                        <label for="kanji_char">Kanji:</label>
                        <input type="text" class="form-control" name= "kanji_char" id="kanji_char" placeholder="Zadajte kanji" 
                         value="'.$kanji_char.'" maxlength="16" required>
                        <label for="kunyoumi">Kunyoumi (tvar ku kane):</label>
                        <input type="text" class="form-control" name= "kunyoumi" id="kunyoumi" placeholder="Zadajte kunyoumi (tvar ku kane)"
                         value="'.$kunyoumi.'" maxlength="32" required>
						<label for="onyoumi">Onyoumi (tvar ku kanji):</label>
                        <input type="text" class="form-control" name= "onyoumi" id="onyoumi" placeholder="Zadajte onyoumi (tvar ku kanji)"
                         value="'.$onyoumi.'" maxlength="32" required> 
						<label for="slovak">Preklad/význam:</label>
                        <input type="text" class="form-control" name= "slovak" id="slovak" placeholder="Zadajte preklad/význam"
                         value="'.$slovak.'" maxlength="32" required> 
                    ';
            echo '</div>
                    <button type="submit" class="btn btn-primary">Upraviť kanji</button>';
        } else echo '<h2 class="red">Kanji sa nenašlo</h2>';
    }
    else echo http_response_code(400);
}
else echo http_response_code(400);
