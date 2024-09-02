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
function getOrdersForTable($orderColumns,$orderColumn,$order){
	$ordersTable=[];
	for ($i=0;$i<count($orderColumns);$i++){
		if ($orderColumn==$orderColumns[$i] && $order!="DESC")
			array_push($ordersTable,"DESC");
		else
			array_push($ordersTable,"ASC");
	}
	return $ordersTable;
}
function generateLinkForWords($type,$showType,$orderColumn=null,$order=null,$fromDate=null,$toDate=null,$subType=null,$frontLanguage=null){	
	$link="words.php?type=$type&showType=$showType";
	if ($orderColumn!=null && $order!=null)
		$link.="&orderColumn=$orderColumn&order=$order";
	if ($frontLanguage!=null && in_array($frontLanguage,["JP","SVK"]))
		$link.="&frontLanguage=$frontLanguage";
	if ($subType!=null)
		$link.="&subType=".$subType;
	if (($fromDate !=null && $fromDate !='2000-01-01') && ($toDate!=null && $toDate!='3333-03-03'))
		$link.="&monthWords=1";
	return $link;
}

function importCSVtooltip($addtype){
	$returnText= "Parametre riadku pri pridávaní z .csv súboru sú v rovnakom poradí ako pri manuálnom priradení, kde každý parameter je oddelený bodkočiarkou:\n";
	if ($addtype == 0)
		return $returnText."	japonsky;slovensky;typ;podtyp,podtyp2;kanji";
	else if ($addtype == 1)
		return $returnText."	názovGramatiky;popisGramatiky";
	else if ($addtype == 2)
		return $returnText."	názovGramatiky;japonskaVeta;prekladVety";
	else if ($addtype == 3)		 
		return $returnText."	kanjiZnak;kunyoumi;onyoumi;preklad";
	return ;
}