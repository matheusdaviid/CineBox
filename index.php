<?php 

    require './classes/Filmes.php';
    $titulo = "CineBox -Início";
    include './includes/header.php';
    include './includes/banner.php';

    
    $filmes = new Filmes();
    $dadosFilme = $filmes->exibirListaFilmes(8);

    

    include './includes/listar_filmes.php';
    include './includes/footer.php';