<?php
function mb_escape($string)
{
    return preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C]~u', '\\\$0', $string);
}
function echo_grammar($conn,$grammar){
    $grammarID=$grammar["id"];
    $grammarTitle=$grammar["grammar_title"];
    $grammarDescription=$grammar["grammar_description"];
    $functionEditForm="'$grammarID',1";
    echo '<h2 class="purple">'.$grammarTitle.'</h2>';
    echo '<h4 class="green">Popis gramatiky:</h4>';
    echo '<p class="black grammar_description">'.$grammarDescription.'<a class="nodec editWord" onclick= "generateEditForm('.$functionEditForm.')">
                        <i class = "bi bi-pencil-square"></i></a>
                        <a class="nodec deleteX grammar" id = "' . $grammarID . '">
                        <i class = "bi bi-trash"></i></a></p>';
    echo '<h4 class="green">Zoznam viet:</h4>';
    $resultSentences=selectSentencesByGrammarID($conn,$grammarID);
    if ($resultSentences){
        while ($grammarSentence=mysqli_fetch_assoc($resultSentences)){
            $sentenceID=$grammarSentence["id"];
            $japSentence=$grammarSentence["jap_sentence"];
            $svkSentence=$grammarSentence["svk_sentence"];
            $functionEditForm="'$sentenceID',2";
            echo "<div class='black sentence'> <p>$japSentence - $svkSentence";
            echo '<a class="nodec editWord" onclick= "generateEditForm('.$functionEditForm.')">
                        <i class = "bi bi-pencil-square"></i></a>
                        <a class="nodec deleteX grammar" id = "' . $grammarID . '">
                        <i class = "bi bi-trash"></i></a></p></div>';

        }

    }
}
