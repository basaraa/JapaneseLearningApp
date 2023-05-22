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
function selectWords($conn,$type){
    if ($type == "podstatne meno")
        $sql="SELECT words.id,jap_word,svk_word,word_type,type_name,day_of_addition FROM words JOIN nounTypes ON nounTypes.id=words.word_subtype_id WHERE word_type='".$type."' ";
    else if ($type!="all")
        $sql="SELECT * FROM words WHERE word_type='".$type."'";
    else
        $sql="SELECT * FROM words";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
function selectNounTypes($conn){
    $sql = "SELECT * FROM nounTypes";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectSubTypeWords($conn,$type){
    $sql="SELECT words.id,nounTypes.id as 'type_id',jap_word,svk_word,word_type,type_name,day_of_addition FROM words
            JOIN nounTypes ON nounTypes.id=words.word_subtype_id
            WHERE nounTypes.id='".$type."' ";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
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
        if ($language=="JAP")
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
