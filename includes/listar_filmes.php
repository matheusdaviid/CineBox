<section id="filmes_recomendados">
    <h2 class="titulo">Filmes</h2>
    <main class="container">
        <div class="row">

            <?php foreach ($dadosFilme as $filme) {
                $dadosGeneros=$bob->consultarGeneroByIdFilme($value['id']);
                include './includes/filme_card.php';
            } ?>



        </div>
    </main>

</section>  