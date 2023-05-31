<?php
function mb_escape($string)
{
    return preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', '\\\$0', $string);
}
function echo_grammar($conn,$grammar){
    $grammarID=$grammar["id"];
    $grammarTitle=$grammar["grammar_title"];
    $grammarDescription=$grammar["grammar_description"];
    echo '<h2 class="purple">'.$grammarTitle.'</h2>';
    echo '<h4 class="green">Popis gramatiky:</h4>';
    echo '<p class="black grammar_description">'.$grammarDescription.'</p>';
    echo '<h4 class="green">Zoznam viet:</h4>';
    $resultSentences=selectSentencesByGrammarID($conn,$grammarID);
    if ($resultSentences){
        while ($grammarSentence=mysqli_fetch_assoc($resultSentences)){
            $japSentence=$grammarSentence["jap_sentence"];
            $svkSentence=$grammarSentence["svk_sentence"];
            echo "<div class='black sentence'> <p>$japSentence - $svkSentence</p> </div>";
        }
    }
}
