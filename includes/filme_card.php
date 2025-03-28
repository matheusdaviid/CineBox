<div class="col-lg-<?= isset($qntd) ? $qntd : 3 ?> col-md-6 col-sm-12">
                    <figure>
                            <a href="filmes-consultar.php"><img src="assets/img/poster/<?=$filme['poster'] ?>"
                            alt="Poster do filme Avatar o caminho da água" class="foto_produto"></a>
                        <figcaption>
                            <h4><?=$filme['nome']?></h4>
                            <span class="preco"><?=$filme['valor_ingresso']?></span>
                            <p class="descricao"><?=$filme['descricao']?></p>
                        </figcaption>
                        <span class="genero">
                            <?php foreach($dadosGeneros as $value2){ ?>
                                <label style="background-color: #<?= $value2['cor'] ?>;"><?= $value2['nome'] ?></label>
                            <?php } ?>
                        </span>
                    </figure>
                </div>