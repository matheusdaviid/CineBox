<section id="detalhe">
    <main class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 my-4">
                <img src="assets/img/poster/<?= $dados['poster'] ?>" alt="Poster do filme <?= $dados['nome'] ?>" class="foto">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 detalhe-produto py-5">
                <h1 class="titulo-jogo"><?= $dados['nome'] ?></h1>

                <div class="genero">
                    <?php foreach ($dados['generos'] as $gen) { ?>
                        <span style="background-color: #<?= $gen['cor'] ?>;"><?= $gen['nome'] ?></span>
                    <?php } ?>
                </div>

                <h3 class="preco">R$ <?= number_format($dados['valor_ingresso'], 2, ',', '.') ?></h3>

                <div class="versao-filme m-3">
                    <button checked>NORMAL</button>
                    <button>VIP</button>
                </div>

                <form action="" method="post">
                    <input type="hidden" name="id_produto" value="<?= $dados['id'] ?>">
                    <button class="btn btn-success" type="submit"><i class="bi bi-bag"></i> ADICIONAR AO CARRINHO</button>
                </form>

                <div class="sobre-filme">
                    <h4>Descrição</h4>
                    <?php
                    $descricao = explode('. ', $dados['descricao']);

                    foreach ($descricao as $value) {
                        if(!empty(trim($value))) {
                            echo '<p>' . $value . '.</p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</section>