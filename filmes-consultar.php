<?php
require './classes/Filmes.php';
require './classes/Generos.php';

include './includes/header.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $filmes = new Filmes();
    $generos = new Generos();
    
    // Buscar dados do filme
    $dadosFilme = $filmes->buscarFilmePorId($_GET['id']);
    
    // Buscar gêneros do filme
    $generosFilme = $generos->consultarGeneroByIdFilme($_GET['id']);
    
    if($dadosFilme) {
        // Passar os dados para a view
        $dados = $dadosFilme;
        $dados['generos'] = $generosFilme;
        include './includes/filmes_detalhe.php';
    } else {
        echo '<div class="alert alert-danger">Filme não encontrado</div>';
    }
} else {
    header('Location: index.php');
    exit();
}

include_once './includes/footer.php';