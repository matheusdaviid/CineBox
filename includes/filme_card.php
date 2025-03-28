<div class="col-lg-<?= isset($qntd) ? $qntd : 3 ?> col-md-6 col-sm-12">
    <figure>
        <a href="filmes-consultar.php?id=<?= $filme['id'] ?>">
            <img src="assets/img/poster/<?= $filme['poster'] ?>" 
                 alt="Poster do filme <?= $filme['nome'] ?>" class="foto_produto">
        </a>
        <figcaption>
            <h4><?= $filme['nome'] ?></h4>
            <span class="preco">R$ <?= number_format($filme['valor_ingresso'], 2, ',', '.') ?></span>
            <p class="descricao"><?= substr($filme['descricao'], 0, 100) ?>...</p>
        </figcaption>
        <?php if(isset($dadosGenerosFilme) && !empty($dadosGenerosFilme)): ?>
            <span class="genero">
                <?php foreach($dadosGenerosFilme as $genero): ?>
                    <label style="background-color: #<?= $genero['cor'] ?>;">
                        <?= $genero['nome'] ?>
                    </label>
                <?php endforeach; ?>
            </span>
        <?php endif; ?>
    </figure>
</div>