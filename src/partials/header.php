<?php ?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="partials/style.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Japončina</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
                                    <a class="nav-link" href="words.php?type=0&showType=2">Zoznam kategórii</a>
                                    <a class="nav-link" href="words.php?type=0&showType=0">Zoznam slov</a>
                                    <a class="nav-link" href="words.php?type=0&showType=1&frontLanguage=JP">Karty JP->SVK</a>
                                    <a class="nav-link" href="words.php?type=0&showType=1&frontLanguage=SVK">Karty SVK->JP</a>
                                    <a class="nav-link" href="exam.php?type=0&subType=&questionLanguage=SVK">Test SVK->JP</a>
                                    <a class="nav-link" href="exam.php?type=0&subType=&questionLanguage=JP">Test JP->SVK</a>
                                </div></div>
                                <div><a class="nav-link" href="words.php?type=1&showType=0">Prídavné mená</a>
                                <div class="dropdown-subcontent">
                                    <a class="nav-link" href="words.php?type=1&showType=0">Zoznam</a>
                                    <a class="nav-link" href="words.php?type=1&showType=1&frontLanguage=JP">Karty JP->SVK</a>
                                    <a class="nav-link" href="words.php?type=1&showType=1&frontLanguage=SVK">Karty SVK->JP</a>
                                    <a class="nav-link" href="exam.php?type=1&subType=&questionLanguage=SVK">Test SVK->JP</a>
                                    <a class="nav-link" href="exam.php?type=1&subType=&questionLanguage=JP">Test JP->SVK</a>
                                </div></div>
                                <div><a class="nav-link" href="words.php?type=2&showType=0">Slovesá</a>
                                <div class="dropdown-subcontent">
                                    <a class="nav-link" href="words.php?type=2&showType=0">Zoznam</a>
                                    <a class="nav-link" href="words.php?type=2&showType=1&frontLanguage=JP">Karty JP->SVK</a>
                                    <a class="nav-link" href="words.php?type=2&showType=1&frontLanguage=SVK">Karty SVK->JP</a>
                                    <a class="nav-link" href="exam.php?type=2&subType=0&questionLanguage=SVK">Test SVK->JP</a>
                                    <a class="nav-link" href="exam.php?type=2&subType=0&questionLanguage=JP">Test JP->SVK</a>
                                </div></div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gramatika</a>
                            <div class="dropdown-content">
                                <a class="nav-link" href="grammar.php?showType=0">Všetky gramatiky</a>
                                <a class="nav-link" href="grammar.php?showType=1">Zoznam gramatík</a>
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
                    </ul>
                </div>
            </nav>
        </div>
</header>
