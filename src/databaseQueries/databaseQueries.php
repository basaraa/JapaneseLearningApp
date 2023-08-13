<?php

function selectAlphabet($conn,$type){
    if ($type=="hiragana")
        $sql="SELECT hiragana as 'kana',romaji FROM kana";
    else if ($type=="katakana")
        $sql = "SELECT katakana as 'kana',romaji FROM kana";
    else
        $sql="SELECT kanji_char,kunyoumi,onyoumi,slovak FROM kanji";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
function selectWords($conn,$type,$orderColumn,$order){
    if ($type == "podstatne meno")
        $sql="SELECT words.id,jap_word,svk_word,word_type,type_name,day_of_addition FROM words JOIN nounTypes ON nounTypes.id=words.word_subtype_id 
                WHERE word_type='".$type."' ORDER BY $orderColumn $order";
    else if ($type!="all")
        $sql="SELECT * FROM words WHERE word_type='".$type."' ORDER BY $orderColumn $order";
    else
        $sql="SELECT * FROM words ORDER BY $orderColumn $order";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
function selectWordByName($conn,$word){
    $sql="SELECT * FROM words where jap_word='".$word."'";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectWordByNameCheckDuplicate($conn,$word,$id){
    $sql="SELECT * FROM words where jap_word='".$word."' and id != '".$id."'";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectWordByID($conn,$id){
    $sql="SELECT words.id,jap_word,svk_word,word_type,word_subtype_id FROM words 
    where words.id='".$id."' limit 1";
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
function selectSubTypeWords($conn,$type){
    $sql="SELECT words.id,nounTypes.id as 'type_id',jap_word,svk_word,word_type,type_name,day_of_addition FROM words
            JOIN nounTypes ON nounTypes.id=words.word_subtype_id
            WHERE nounTypes.id='".$type."' ORDER BY words.jap_word";
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
function selectExamQuestions ($conn,$type,$subType,$language){
    if ($subType==0){
        if ($language=="SVK")
            $sql="SELECT DISTINCT id,svk_word as 'word',jap_word as 'translate' FROM words WHERE word_type='".$type."' ORDER BY RAND () LIMIT 10";
        if ($language=="JP")
            $sql="SELECT DISTINCT id,jap_word as 'word',svk_word as 'translate' FROM words WHERE word_type='".$type."' ORDER BY RAND () LIMIT 10";
    }
    else {
        if ($language=="SVK")
            $sql="SELECT DISTINCT words.id,svk_word as 'word',jap_word as 'translate' FROM words 
                    JOIN nounTypes ON nounTypes.id=words.word_subtype_id
                    WHERE word_type='".$type."' AND nounTypes.id = '".$subType."' ORDER BY RAND () LIMIT 10";
        if ($language=="JP")
            $sql="SELECT DISTINCT words.id,jap_word as 'word',svk_word as 'translate' FROM words 
                    JOIN nounTypes ON nounTypes.id=words.word_subtype_id
                    WHERE word_type='".$type."' AND nounTypes.id = '".$subType."' ORDER BY RAND () LIMIT 10";
    }
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
function selectExamAnswers ($conn,$type,$subType,$language,$id){
    if ($subType==0){
        if ($language=="SVK")
            $sql="SELECT DISTINCT svk_word as 'word',jap_word as 'translate' FROM words WHERE word_type='".$type."' and id != '".$id."' ORDER BY RAND () LIMIT 3";
        if ($language=="JP")
            $sql="SELECT DISTINCT jap_word as 'word',svk_word as 'translate' FROM words WHERE word_type='".$type."' and id!= '".$id."' ORDER BY RAND () LIMIT 3";
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

//insert queries
function insertWord($conn,$japWord,$svkWord,$type,$nounType){
    $sql="INSERT INTO words (jap_word,svk_word,word_type,word_subtype_id,day_of_addition) VALUES ('$japWord','$svkWord','$type',NULLIF('$nounType',''),now())";
    $result=$conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
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
function updateWord ($conn,$id, $japWord, $svkWord, $type, $nounType){
    $subject = "UPDATE words
                SET jap_word='".$japWord."',svk_word='".$svkWord."', word_type='".$type."',
                word_subtype_id = NULLIF('$nounType','')           
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

