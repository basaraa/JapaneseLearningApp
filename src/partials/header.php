<?php ?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="partials/style.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <title>Japončina</title>
</head>
<body>
<header>
    <div class="header_section">
        <div class="container-fluid header_main">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Domov</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Abeceda</a>
                            <div class="dropdown-content">
                                <a class="nav-link" href="alphabet.php?type=hiragana">Hiragana</a>
                                <a class="nav-link" href="alphabet.php?type=katakana">Katakana</a>
                                <a class="nav-link" href="alphabet.php?type=kanji">Kanji</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="words.php?type=3&showType=0">Slová</a>
                            <div class="dropdown-content">
                                <div><a class="nav-link" href="words.php?type=0&showType=0">Podstatné mená</a>
                                <div class="dropdown-subcontent">
									<a class="nav-link" href="words.php?type=0&showType=0">Zoznam</a>
									<a class="nav-link" href="words.php?type=0&showType=0&monthWords=1">Zoznam Mesiaca</a>
									<a class="nav-link" href="words.php?type=0&showType=2">Kategórie</a> 	
                                    <a class="nav-link" href="words.php?type=0&showType=1&frontLanguage=JP">Karty JP->SVK</a>
                                    <a class="nav-link" href="words.php?type=0&showType=1&frontLanguage=SVK">Karty SVK->JP</a>
                                </div></div>
                                <div><a class="nav-link" href="words.php?type=1&showType=0">Prídavné mená</a>
                                <div class="dropdown-subcontent">
                                    <a class="nav-link" href="words.php?type=1&showType=0">Zoznam</a>
									<a class="nav-link" href="words.php?type=1&showType=0&monthWords=1">Zoznam Mesiaca</a>
                                    <a class="nav-link" href="words.php?type=1&showType=1&frontLanguage=JP">Karty JP->SVK</a>
                                    <a class="nav-link" href="words.php?type=1&showType=1&frontLanguage=SVK">Karty SVK->JP</a>
                                </div></div>
                                <div><a class="nav-link" href="words.php?type=2&showType=0">Slovesá</a>
                                <div class="dropdown-subcontent">
                                    <a class="nav-link" href="words.php?type=2&showType=0">Zoznam</a>
									<a class="nav-link" href="words.php?type=2&showType=0&monthWords=1">Zoznam Mesiaca</a>
                                    <a class="nav-link" href="words.php?type=2&showType=1&frontLanguage=JP">Karty JP->SVK</a>
                                    <a class="nav-link" href="words.php?type=2&showType=1&frontLanguage=SVK">Karty SVK->JP</a>
                                </div></div>
								<div><a class="nav-link" href="words.php?type=4&showType=0">Vety</a>
                                <div class="dropdown-subcontent">
									<a class="nav-link" href="words.php?type=4&showType=0">Zoznam</a>
									<a class="nav-link" href="words.php?type=4&showType=0&monthWords=1">Zoznam Mesiaca</a>
                                    <a class="nav-link" href="words.php?type=4&showType=2">Kategórie</a>                                   
                                    <a class="nav-link" href="words.php?type=4&showType=1&frontLanguage=JP">Karty JP->SVK</a>
                                    <a class="nav-link" href="words.php?type=4&showType=1&frontLanguage=SVK">Karty SVK->JP</a>
                                </div></div>
								<div><a class="nav-link" href="words.php?type=3&showType=2">Kategórie</a></div>
								<div><a class="nav-link" href="words.php?type=3&showType=0">Zoznam</a></div>
								
								<div><a class="nav-link" href="words.php?type=3&showType=0&monthWords=1">Zoznam Mesiaca</a></div>
								
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gramatika</a>
                            <div class="dropdown-content">
                                <a class="nav-link" href="grammar.php?showType=0">Popis s príkladmi</a>
                                <a class="nav-link" href="grammar.php?showType=1">Zoznam gramatík</a>
                                <a class="nav-link" href="verbFormsInGeneral.php?showType=0">Časovanie slovies</a>
								<a class="nav-link" href="imgShowerOnly.php?title=poradie_vety_v_japončine">Poradie slov vo vete</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pridať</a>
                            <div class="dropdown-content">
                                <a class="nav-link" href="addForm.php?addType=0">Slová</a>
                                <a class="nav-link" href="addForm.php?addType=1">Gramatiku</a>
                                <a class="nav-link" href="addForm.php?addType=2">Vety ku gramatike</a>
                                <a class="nav-link" href="addForm.php?addType=3">Kanji</a>
                            </div>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="exam.php?getExamForm=1">Test</a>
                        </li>
						
                    </ul>
                </div>
            </nav>
        </div>
</header>
