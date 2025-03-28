<?php session_start();?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>

    <?php
        if (isset($titulo) && !empty($titulo)) {
            echo $titulo;
        } else {
            echo 'Cinebox';
        }
 
        ?>
 



    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/carrossel.css">
    <link rel="stylesheet" href="assets/css/filmes.css">
    <link rel="stylesheet" href="assets/css/usuario.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/filtro.css">
    <link rel="stylesheet" href="assets/css/detalhes.css">

</head>

<body>
    <header>
        <nav>
            <a href="#" class="logo">
                <h1>Cine Box</h1>
            </a>
            <ul class="menu_icones">
                <li><a href="./index.php">Inicio</a></li>
                <li><a href="./listarfilmes.php">Filmes</a></li>
                <li><a href="./sobre.php">Sobre</a></li>
            </ul>

            <ul class="menu_icones">
                <li><a href="#"><i class="bi bi-search"></i></a></li>
                <li><a href="#"><i class="bi bi-heart"></i></a></li>
                <li><a href="#"><i class="bi bi-cart3"></i></a></li>
                <li><a href="./usuario.php"><i class="bi bi-person-circle"></i></a></li>
            </ul>

            <button class="escondido" onclick="javascript:abrir_nav()">
                <i class="bi bi-list"></i>
            </button>

            <div id="offcanvas" class="escondido">
                <button class="fechar" onclick="javascript:fechar_nav()">
                    <i class="bi bi-x"></i>
                </button>
                <a href="index.php">Inicio</a>
                <a href="listar_filmes.php">Filmes</a>
                <a href="sobre.php">Sobre</a>
            </div>

        </nav>
    </header>