<section id="filmes_recomendados">
    <h2 class="titulo">Filmes</h2>
    <main class="container">
        <div class="row">
            <?php 
            if(isset($dadosFilme) && is_array($dadosFilme)) {
                foreach ($dadosFilme as $filme) {
                    // Obter os gêneros específicos deste filme
                    $dadosGenerosFilme = $generos->consultarGeneroByIdFilme($filme['id']);
                    include './includes/filme_card.php';
                }
            } else {
                echo '<div class="col-12"><p class="text-center">Nenhum filme disponível no momento.</p></div>';
            }
            ?>
        </div>
    </main>
</section>