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
    $sql = "SELECT * from nounTypes";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;
}
function selectSubTypeWords($conn,$type){
    $sql="SELECT words.id,nounTypes.id as 'type_id',jap_word,svk_word,word_type,type_name,day_of_addition FROM words JOIN nounTypes ON nounTypes.id=words.word_subtype_id WHERE nounTypes.id='".$type."' ";
    $result = $conn->query($sql) or die ("Chyba pri vykonaní select query".$conn->error);
    return $result;

}
