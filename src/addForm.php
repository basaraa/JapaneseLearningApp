<?php
include "partials/header.php";

if ((isset($_GET["addType"]))) {
    require_once("config/config.php");
    include "databaseQueries/databaseQueries.php";
    $addType=intval($_GET["addType"]);
    if ($addType >=0 && $addType<=3) {
        echo '<h3 class="purple">Vložiť manuálne:</h3><form class="form addForm">                   
                    <input type="hidden" id="addType" name="addType" value = "' . $addType . '">';
        //slová
        if ($addType == 0) {
            echo '<div class="form-group">					
                        <label for="japWord">Japonské slovo: </label><span class="remainChars">{{ RemainingChars(0) }}</span>
                        <input v-model="formInput[0]" type="text" class="form-control" name= "japWord" id="japWord" placeholder="Zadajte japonské slovo" maxlength="64" required>				
                        <label for="svkWord">Preklad:</label><span class="remainChars">{{ RemainingChars(1) }}</span>
                        <input v-model="formInput[1]" type="text" class="form-control" name= "svkWord" id="svkWord" placeholder="Zadajte preklad" maxlength="128" required>
                        <label for="type">Typ slova:</label>
                        <select class="form-control wordType" name= "type" id="type" required>
                            <option value="podstatne meno" >Podstatné meno</option>
                            <option value="pridavne meno" >Prídavné meno</option>
                            <option value="sloveso" >Sloveso</option>
                        </select>
                        <label id="nounTypeLabel" for="nounType">Podtyp slova:</label>
                        <select class="form-control" name = "nounType" id="nounType">
                       
                    ';
            $result = selectNounTypes($conn);
            if ($result) {
                while ($nounType = mysqli_fetch_assoc($result)) {
                    $subType = $nounType["type_name"];
                    $id = $nounType["id"];
                    echo "<option value=$id>$subType</option>";
                }
            }
			echo '		</select>
						<label for="kanji">Znak kanji:</label><span class="remainChars">{{ RemainingChars(2) }}</span>
						<input v-model="formInput[2]" type="text" class="form-control" name= "kanji" id="kanji" placeholder="Zadajte kanji znak" maxlength="16">
					</div>
					<button type="submit" class="btn btn-primary">Vložiť slovo</button>
                </form>';

        }
        //grammar
        else if ($addType == 1) {
            echo '<div class="form-group">
                        <label for="grammarTitle">Názov gramatiky:</label><span class="remainChars">{{ RemainingChars(0) }}</span>
                        <input v-model="formInput[0]" type="text" class="form-control" name= "grammarTitle" id="grammarTitle" placeholder="Zadajte názov gramatiky" maxlength="64" required>
                        <label for="grammarDescription">Popis gramatiky:</label><span class="remainChars">{{ RemainingChars(1) }}</span>
                        <input v-model="formInput[1]" type="text" class="form-control" name= "grammarDescription" id="grammarDescription" placeholder="Zadajte popis gramatiky" maxlength="128" required> 
                  </div>
                  <button type="submit" class="btn btn-primary">Vložiť gramatiku</button>
                </form>';
        }
        //grammar sentence
        else if ($addType == 2){
            echo '<div class="form-group">
                  <label for="grammarID">Gramatika ku ktorej patrí veta:</label>
                  <select class="form-control" name = "grammarID" id="grammarID">';
            $result = selectGrammars($conn);
            if ($result) {
                while ($grammar = mysqli_fetch_assoc($result)) {
                    $grammarTitle = $grammar["grammar_title"];
                    $grammarID = $grammar["id"];
                    echo "<option value=$grammarID>$grammarTitle</option>";
                }
            }
            echo '</select><label for="grammarJapSentence">Veta po japonsky:</label><span class="remainChars">{{ RemainingChars(0) }}</span>
                  <input v-model="formInput[0]" type="text" class="form-control" name= "grammarJapSentence" id="grammarJapSentence" placeholder="Zadajte vetu ku gramatike po japonsky:" maxlength="128" required>
                  <label for="grammarSvkSentence">Veta po slovensky:</label><span class="remainChars">{{ RemainingChars(1) }}</span>
                  <input v-model="formInput[1]" type="text" class="form-control" name= "grammarSvkSentence" id="grammarSvkSentence" placeholder="Zadajte vetu ku gramatike po slovensky:" maxlength="128" required>                
                  </div>
                  <button type="submit" class="btn btn-primary">Vložiť vetu</button>
                  </form>';
        }
        //kanji
        else if ($addType == 3) {
            echo '<div class="form-group">
                        <label for="kanji">Znak kanji:</label><span class="remainChars">{{ RemainingChars(0) }}</span>
                        <input v-model="formInput[0]" type="text" class="form-control" name= "kanji" id="kanji" placeholder="Zadajte kanji znak" maxlength="16" required>
                        <label for="kunyoumi">Zadajte kunyoumi (tvar ku kane):</label><span class="remainChars">{{ RemainingChars(1) }}</span>
                        <input v-model="formInput[1]" type="text" class="form-control" name= "kunyoumi" id="kunyoumi" placeholder="Zadajte kunyoumi" maxlength="32" required>
                        <label for="onyoumi">Zadajte onyoumi (tvar ku ostatným kanji):</label><span class="remainChars">{{ RemainingChars(2) }}</span>
                        <input v-model="formInput[2]" type="text" class="form-control" name= "onyoumi" id="onyoumi" placeholder="Zadajte onyoumi" maxlength="32" required>  
                        <label for="grammarDescription">Význam po slovensky:</label><span class="remainChars">{{ RemainingChars(3) }}</span>
                        <input v-model="formInput[3]" type="text" class="form-control" name= "slovak" id="slovak" placeholder="Zadajte význam kanji po slovensky" maxlength="32" required>  
                  </div>
                  <button type="submit" class="btn btn-primary">Vložiť kanji</button>
                </form>';
        }
        echo '<h3 class="csvImporth purple">Vložiť z .csv súboru:</h3>
				<p>Parametre riadku pri pridávaní z .csv súboru sú v rovnakom poradí ako pri manuálnom priradení, kde každý parameter je oddelený bodkočiarkou.</p>
                <form class="form addFormCSV" method="post" enctype="multipart/form-data">
                <input type="hidden" id="type" name="addType" value = "'.$addType.'">
                <div class="form-group">
                <label for="fileCSV">Názov súboru:</label>
                        <input type="file" class="form-control" name= "fileCSV" id="fileCSV" required>                    
                </div>
                        <button type="submit" class="btn btn-primary">Vložiť zo súboru</button>
                </form>';
    }
    else http_response_code(400);
}
else http_response_code(400);
?>
<div id="modal_background2"></div>
<div class="modal_div2">
    <div id="modal_vrstva2">
        <div id="modal_text2"></div>
        <button class="btn btn-primary" onclick="go_back3();">Pridať ďalšie</button>
    </div>
</div>
<div id="modal_background"></div>
<div class="modal_div">
    <div id="modal_vrstva">
        <div id="modal_text"></div>
        <button class="btn btn-primary" onclick="go_back();">Vrátiť sa späť</button>
    </div>
</div>
<?php
include "partials/footer.php";
?>