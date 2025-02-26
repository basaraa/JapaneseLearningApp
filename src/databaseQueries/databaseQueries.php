<?php

function selectAlphabet($conn,$type){
    if ($type=="hiragana")
        $sql="SELECT hiragana as 'kana',romaji FROM kana";
    else if ($type=="katakana")
        $sql = "SELECT katakana as 'kana',romaji FROM kana";
    else
        $sql="SELECT id,kanji_char,kunyoumi,onyoumi,slovak FROM kanji";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
function selectKanjiByID($conn,$id){
	$sql="SELECT kanji_char,kunyoumi,onyoumi,slovak FROM kanji where id='".$id."' limit 1";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}

function selectKanjiCombinations($conn,$kanji){
    $sql="SELECT kanji,jap_word,svk_word FROM words WHERE POSITION('".$kanji."' IN kanji) > 0";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
function selectWords($conn,$type,$orderColumn,$order,$fromDate="2000-01-01",$toDate="3333-03-03",$subType=null){
	//nouns/sentences with certain subtype
	if ($subType!=null){
		if ($type=="all")
			$type="podstatne meno','veta";
		$sql="SELECT words.id,jap_word,svk_word,word_type,type_name as typeNames,day_of_addition,kanji FROM words
            JOIN wordSubtypes ON wordSubtypes.word_id=words.id
			JOIN nounTypes ON nounTypes.id=wordSubtypes.word_subtype_id
			WHERE word_type IN ('".$type."') AND nounTypes.id='".$subType."' AND day_of_addition BETWEEN '".$fromDate."' AND '".$toDate."'
			ORDER BY $orderColumn $order";
	}
	else {
		//nouns/sentences
		if ($type == "podstatne meno" || $type == "veta")
			$sql="SELECT words.id,jap_word,svk_word,word_type,day_of_addition,kanji,GROUP_CONCAT(type_name ORDER BY type_name SEPARATOR ', ') as typeNames FROM words
				LEFT JOIN wordSubtypes ON wordSubtypes.word_id=words.id
				LEFT JOIN nounTypes ON nounTypes.id=wordSubtypes.word_subtype_id
				WHERE word_type='".$type."' AND day_of_addition BETWEEN '".$fromDate."' AND '".$toDate."'
				GROUP BY words.id
				ORDER BY $orderColumn $order";
				
		//the rest
		else if ($type!="all")
			$sql="SELECT * FROM words 
				  WHERE word_type='".$type."' AND day_of_addition BETWEEN '".$fromDate."' AND '".$toDate."'
				  ORDER BY MIN($orderColumn) $order";
		//all words
		else
			$sql="SELECT words.id,jap_word,svk_word,word_type,day_of_addition,kanji,GROUP_CONCAT(type_name ORDER BY type_name SEPARATOR ', ') as typeNames FROM words
				LEFT JOIN wordSubtypes ON wordSubtypes.word_id=words.id
				LEFT JOIN nounTypes ON nounTypes.id=wordSubtypes.word_subtype_id	
				  WHERE day_of_addition between '".$fromDate."' AND '".$toDate."'
				  GROUP BY words.id
				  ORDER BY MIN($orderColumn) $order";
	}
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectWordSubtypesNamesByWordID($conn,$word_id){
	$sql="SELECT word_id,GROUP_CONCAT(wordSubtypes.word_subtype_id ORDER BY wordSubtypes.word_subtype_id SEPARATOR ',') as word_subtype_id  FROM wordSubtypes 
		JOIN nounTypes ON nounTypes.id=wordSubtypes.word_subtype_id 
		WHERE word_id='".$word_id."'
		GROUP BY word_id";
	$result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectWordByNameTypeNounType($conn,$word,$type,$nountypes){
	if ($nountypes!=NULL)
		$sql="SELECT words.id,GROUP_CONCAT(word_subtype_id ORDER BY word_subtype_id SEPARATOR ',') as word_subtype_ids FROM words
				LEFT JOIN wordSubtypes ON words.id=wordSubtypes.word_id				
				WHERE jap_word='".$word."' and word_type='".$type."'
				GROUP BY words.id	
				HAVING word_subtype_ids='".$nountypes."'";
	else
		$sql="SELECT words.id,word_subtype_id as word_subtype_ids FROM words
				LEFT JOIN wordSubtypes ON words.id=wordSubtypes.word_id
				WHERE jap_word='".$word."' and word_type='".$type."' 
				GROUP BY words.id,word_subtype_id 
				HAVING Count(word_subtype_id)=0";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectWordByNameCheckDuplicate($conn,$word,$id,$type,$nountype){
    $sql="SELECT * FROM words 
		  JOIN wordSubtypes ON words.id=wordSubtypes.word_id
		  WHERE jap_word='".$word."' and word.id != '".$id."' and word_type='".$type."' and word_subtype_id='".$nountype."'";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectWordByID($conn,$id){
    $sql="SELECT words.id,jap_word,svk_word,word_type,GROUP_CONCAT(word_subtype_id ORDER BY word_subtype_id SEPARATOR ', ') as word_subtype_id,kanji FROM words
		  LEFT JOIN wordSubtypes ON words.id=wordSubtypes.word_id
		  WHERE words.id='".$id."' 
		  GROUP BY words.id limit 1";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectGrammarByTitle($conn,$grammarTitle){
    $sql="SELECT * FROM grammar where grammar_title='".$grammarTitle."' limit 1";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectGrammarByID($conn,$grammarID){
    $sql="SELECT * FROM grammar where id='".$grammarID."' limit 1";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectGrammars($conn){
    $sql="SELECT * FROM grammar";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectGrammarByTitleCheckDuplicate($conn,$title,$id){
    $sql="SELECT * FROM grammar where grammar_title='".$title."' and id != '".$id."'";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectSentencesByGrammarID($conn,$grammarID){
    $sql="SELECT * FROM grammar_sentences where grammar_id='".$grammarID."'";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectGrammarSentenceByID($conn,$sentenceID){
    $sql="SELECT * FROM grammar_sentences where id='".$sentenceID."'";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectNounTypes($conn){
    $sql = "SELECT * FROM nounTypes ORDER by type_name";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectNounTypeByID($conn,$id){
    $sql = "SELECT * FROM nounTypes where id='".$id."' limit 1";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectVerbWordsByOrigin($conn,$origin,$origins){
	if ($origin=="kuru")
        $sql = "SELECT jap_word FROM words 
                WHERE word_type = 'sloveso' AND UPPER(jap_word) = '".strtoupper($origin)."'           
                ORDER by jap_word";
    else if (strlen($origin)!=1 && $origin != "suru")
        $sql = "SELECT jap_word FROM words 
                WHERE word_type = 'sloveso' AND jap_word LIKE '%".$origin."' 
                AND SUBSTR(jap_word,-4) NOT IN ('suru','Kuru') 
                ORDER BY jap_word";
	else if ($origin=="suru")
        $sql = "SELECT jap_word FROM words 
                WHERE word_type = 'sloveso' AND jap_word LIKE '%" .$origin."'           
                ORDER by jap_word";			
    else
        $sql = "SELECT jap_word FROM words 
                WHERE word_type = 'sloveso' AND jap_word LIKE '%".$origin."' 
                AND SUBSTR(jap_word,-2) NOT IN ('".implode("','",$origins)."') AND SUBSTR(jap_word,-4) NOT IN ('suru','Kuru')
                ORDER by jap_word";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectVerbFormOrigins($conn){
    $sql = "SELECT DISTINCT origin FROM verbFormSuffixes";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectVerbFormByOrigins($conn,$origin){
    $sql = "SELECT form_suffix,form_name FROM verbFormSuffixes 
                JOIN verbFormTypes ON verbFormTypes.id = verbFormSuffixes.form_id
                WHERE origin = '".$origin."'";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}

//exam
function selectExamQuestions ($conn,$type,$subType,$language,$dateFrom,$dateTo){
    if ($subType==0 || $subType=="all"){
        if ($language=="SVK"){
			if ($type=="all")
				$sql="SELECT DISTINCT id,svk_word as 'word',jap_word as 'translate',word_type FROM words 
						WHERE !(day_of_addition < '".$dateFrom."' or day_of_addition > '".$dateTo."') ORDER BY RAND () LIMIT 10";
			else
				$sql="SELECT DISTINCT id,svk_word as 'word',jap_word as 'translate' FROM words 
						WHERE word_type='".$type."' and !(day_of_addition < '".$dateFrom."' or day_of_addition > '".$dateTo."') ORDER BY RAND () LIMIT 10";
		}
        if ($language=="JP"){
			if ($type=="all")
				$sql="SELECT DISTINCT id,jap_word as 'word',svk_word as 'translate',word_type FROM words
						WHERE !(day_of_addition < '".$dateFrom."' or day_of_addition > '".$dateTo."') ORDER BY RAND () LIMIT 10";
			else
				$sql="SELECT DISTINCT id,jap_word as 'word',svk_word as 'translate' FROM words 
						WHERE word_type='".$type."' and !(day_of_addition < '".$dateFrom."' or day_of_addition > '".$dateTo."') ORDER BY RAND () LIMIT 10";
		}
    }
    else {
        if ($language=="SVK")
            $sql="SELECT DISTINCT words.id,svk_word as 'word',jap_word as 'translate' FROM words 
                    JOIN nounTypes ON nounTypes.id=words.word_subtype_id
                    WHERE word_type='".$type."' AND nounTypes.id = '".$subType."' AND !(day_of_addition < '".$dateFrom."' or day_of_addition > '".$dateTo."') ORDER BY RAND () LIMIT 10";
        if ($language=="JP")
            $sql="SELECT DISTINCT words.id,jap_word as 'word',svk_word as 'translate' FROM words 
                    JOIN nounTypes ON nounTypes.id=words.word_subtype_id
                    WHERE word_type='".$type."' AND nounTypes.id = '".$subType."' AND !(day_of_addition < '".$dateFrom."' or day_of_addition > '".$dateTo."') ORDER BY RAND () LIMIT 10";
    }
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
function selectExamAnswers ($conn,$type,$subType,$language,$id){
    if ($subType==0 || $subType=="all"){
        if ($language=="SVK")
			$sql="SELECT DISTINCT svk_word as 'word',jap_word as 'translate' FROM words WHERE word_type='".$type."' and id != '".$id."' ORDER BY RAND () LIMIT 3";
        if ($language=="JP")
			$sql="SELECT DISTINCT jap_word as 'word',svk_word as 'translate' FROM words WHERE word_type='".$type."' and id != '".$id."' ORDER BY RAND () LIMIT 3";
    }
    else {
        if ($language=="SVK")
            $sql="SELECT DISTINCT svk_word as 'word',jap_word as 'translate' FROM words 
                    JOIN nounTypes ON nounTypes.id=words.word_subtype_id
                    WHERE word_type='".$type."' AND nounTypes.id = '".$subType."' and words.id != '".$id."' ORDER BY RAND () LIMIT 3";
        if ($language=="JP")
            $sql="SELECT DISTINCT jap_word as 'word',svk_word as 'translate' FROM words 
                    JOIN nounTypes ON nounTypes.id=words.word_subtype_id
                    WHERE word_type='".$type."' AND nounTypes.id = '".$subType."' and words.id != '".$id."' ORDER BY RAND () LIMIT 3";
    }
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function checkAnswer($conn,$id,$language){
    if ($language == "JP")
        $sql="SELECT jap_word as 'word' FROM words WHERE id = '".$id."'";
    else
        $sql="SELECT svk_word as 'word' FROM words WHERE id = '".$id."'";
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}

//delete word
function deleteWord($conn,$id){
    $sql = "DELETE FROM words where id = '".$id."'";
    $result = $conn->query($sql) or die("Chyba pri vykonaní query: " . $conn->error);
    return $result;
}
function deleteGrammar($conn,$id){
    $sql = "DELETE FROM grammar where id = '".$id."'";
    $result = $conn->query($sql) or die("Chyba pri vykonaní query: " . $conn->error);
    return $result;
}
function deleteGrammarSentences($conn,$grammarID,$sentences){
    $sql= "DELETE FROM grammar_sentences where grammar_id='".$grammarID."' and id not in (".implode(',', array_map('intval', $sentences)).")" ;
    $result = $conn->query($sql) or die("Chyba pri vykonaní query: " . $conn->error);
}
function deleteSingleGrammarSentences($conn,$sentenceID){
    $sql= "DELETE FROM grammar_sentences where id='".$sentenceID."' " ;
    $result = $conn->query($sql) or die("Chyba pri vykonaní query: " . $conn->error);
    return $result;
}
function deleteWordSubtypesByWordID($conn,$wordID,$rowSubTypeID){
    $sql= "DELETE FROM wordSubtypes where word_id='".$wordID."' and word_subtype_id= '".$rowSubTypeID."'" ;
    $result = $conn->query($sql) or die("Chyba pri vykonaní query: " . $conn->error);
    return $result;
}

//insert queries
function insertWord($conn,$japWord,$svkWord,$type,$kanji){
    $sql="INSERT INTO words (jap_word,svk_word,word_type,day_of_addition,kanji) VALUES ('$japWord','$svkWord','$type',now(),NULLIF('$kanji',''))";
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function insertWordSubtypes($conn,$word_id,$word_subtype_id){
    $sql="INSERT INTO wordSubtypes (word_id,word_subtype_id) VALUES ('$word_id','$word_subtype_id')";
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error.$word_subtype_id);
    return $result;
}
function insertGrammar($conn,$grammarTitle,$grammarDescription){
    $sql="INSERT INTO grammar (grammar_title,grammar_description) VALUES ('$grammarTitle','$grammarDescription')";
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function insertGrammarSentence($conn,$grammarID,$grammarJapSentence,$grammarSvkSentence){
    $sql="INSERT INTO grammar_sentences (grammar_id,jap_sentence,svk_sentence) VALUES ('$grammarID','$grammarJapSentence','$grammarSvkSentence')";
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function insertKanji($conn,$kanji,$kunyoumi,$onyoumi,$slovak){
    $sql="INSERT INTO kanji (kanji_char,kunyoumi,onyoumi,slovak) VALUES ('$kanji','$kunyoumi','$onyoumi','$slovak')";
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}

//update queries
function updateWord ($conn,$id, $japWord, $svkWord, $type,$kanji){
    $subject = "UPDATE words
                SET jap_word='".$japWord."',svk_word='".$svkWord."', word_type='".$type."', kanji='".$kanji."'        
                WHERE id='".$id."'";
    $result = $conn->query($subject) or die("Chyba pri vykonaní query: " . $conn->error);
    return $result;
}
function updateGrammar ($conn,$id,$grammarTitle,$grammarDescription){
    $subject = "UPDATE grammar
                SET grammar_title='".$grammarTitle."',grammar_description='".$grammarDescription."'           
                WHERE id='".$id."'";
    $result = $conn->query($subject) or die("Chyba pri vykonaní query: " . $conn->error);
    return $result;
}
function updateSentence ($conn,$id,$sentenceJap,$sentenceSvk){
    $subject = "UPDATE grammar_sentences
                SET jap_sentence='".$sentenceJap."',svk_sentence='".$sentenceSvk."'           
                WHERE id='".$id."'";
    $result = $conn->query($subject) or die("Chyba pri vykonaní query: " . $conn->error);
    return $result;
}
function updateKanji ($conn,$id,$kanji_char,$kunyoumi,$onyoumi,$slovak){
    $subject = "UPDATE kanji
                SET kanji_char='".$kanji_char."', kunyoumi='".$kunyoumi."', onyoumi='".$onyoumi."', slovak='".$slovak."'           
                WHERE id='".$id."'";
    $result = $conn->query($subject) or die("Chyba pri vykonaní query: " . $conn->error);
    return $result;
}