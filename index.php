<?php 
    require './classes/Filmes.php';
    require './classes/Generos.php'; // Adicionar esta linha
    
    $titulo = "CineBox -Início";
    include './includes/header.php';
    include './includes/banner.php';

    $filmes = new Filmes();
    $dadosFilme = $filmes->exibirListaFilmes(8);
    
    $generos = new Generos(); // Instanciar a classe Generos
    
    include './includes/listar_filmes.php';
    include './includes/footer.php';