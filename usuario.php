<?php
require './classes/Filmes.php';
include './includes/header.php';

if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET) && $_GET['sair'] =='true' ){
    session_destroy();
    header('Location: index.php');
}
if((!isset($_SESSION['id_pessoa']) && empty($_SESSION) ) ){
    header('location:usuario-login.php');
}

$filmes = new Filmes();
$resultado_consulta_filmes = $filmes->exibirListaFilmes();



?>
<section id="usuario-principal">
    <main class="container usuario-principal">
        <?php
        include_once './includes/user_header.php';
        include_once './includes/user_lista_filmes.php';

        ?>
    </main>
</section>



<?php

include './includes/footer.php';