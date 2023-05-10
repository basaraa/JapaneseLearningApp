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
                            <a class="nav-link" href="index.php">Zoznam predmetov</a>
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
                            <a class="nav-link" href="words.php?type=4">Slovíčka</a>
                            <div class="dropdown-content">
                                <a class="nav-link" href="words.php?type=0">Podstatné mená</a>
                                <a class="nav-link" href="words.php?type=1">Prídavné mená</a>
                                <a class="nav-link" href="words.php?type=2">Slovesá</a>
                                <a class="nav-link" href="words.php?type=3">Ostatne</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gramatika</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
</header>
