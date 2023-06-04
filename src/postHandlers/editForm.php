<?php
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["id"]) && isset($_POST["type"])){
    require_once("../config/config.php");
    include "../databaseQueries/databaseQueries.php";
    $type=$_POST["type"];
    $id=intval($_POST["id"]);
    //word
    if ($type==0){
        $result = selectWordByID($conn,$id);
        if ($result){
            $wordRow=mysqli_fetch_assoc($result);
            $japWord=$wordRow["jap_word"];
            $svkWord=$wordRow["svk_word"];
            $wordType=$wordRow["word_type"];
            $types=["podstatne meno","pridavne meno","sloveso","ostatne"];
            $typesString=["Podstatné meno","Prídavné meno","Sloveso","Ostatné"];
            if ($wordType==$types[0])
                $wordSubTypeID=$wordRow["word_subtype_id"];
            else
                $wordSubTypeID=NULL;
            echo '<form class="form editForm"><div class="form-group">
                        <input type="hidden" id="editType" name="editType" value = "' . $type . '">
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
            echo '</select></div>
                    <button type="submit" class="btn btn-primary">Upraviť slovo</button>
                </form>';
        } else echo '<h2 class="red">Slovo sa nenašlo</h2>';
    }
    else if ($type==1){

    }
    else if ($type==2){

    }
    else echo http_response_code(400);
}
else echo http_response_code(400);
