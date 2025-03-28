<?php
require './classes/Filmes.php';
require './classes/Generos.php';

$titulo = "CineBox - Filmes";
include './includes/header.php';

// Inicializar todas as variáveis necessárias
$filmes = new Filmes();
$generos = new Generos();

// Obter dados
$dadosFilme = $filmes->exibirListaFilmes();
$dadosGeneros = $generos->consultarGeneros(); // Todos os gêneros para o filtro

// Verificar e garantir que as variáveis existem
if(!isset($dadosGeneros) || !is_array($dadosGeneros)) {
    $dadosGeneros = [];
}

include './includes/filmes_filtro.php';
include './includes/footer.php';