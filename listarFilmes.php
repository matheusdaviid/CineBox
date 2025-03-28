<?php

require './classes/Filmes.php';
require './classes/Generos.php';

$titulo = "";
include './includes/header.php';

$filmes = new Filmes();
$dadosFilme = $filmes->exibirListaFilmes();



$bob=new Generos();
$dadosGeneros = $bob->consultarGeneros();



include './includes/filmes_filtro.php';
include './includes/footer.php';
