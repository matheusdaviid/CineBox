<section id="filtroProdutos">
    <main class="container">
        <div class="row">
            <div class="col-2 col-lg-2 col-xs-12">
                <form action="#" method="get" class="filtro">
                    <?php 
                    // Verificação segura antes do foreach
                    if(isset($dadosGeneros) && is_array($dadosGeneros)): 
                        foreach ($dadosGeneros as $value): 
                    ?>
                        <label for="<?= htmlspecialchars($value['nome']) ?>" class="label">
                            <input
                                id="<?= htmlspecialchars($value['nome']) ?>"
                                name="genero[]"
                                value="<?= $value['id'] ?>"
                                type="checkbox" <?= isset($_GET['genero']) && in_array($value['id'], $_GET['genero']) ? 'checked' : '' ?>>
                            <div class="checkmark"></div>
                            <?= htmlspecialchars($value['nome']) ?>
                        </label>
                    <?php 
                        endforeach;
                    else:
                        echo "<p>Nenhum gênero disponível para filtro.</p>";
                    endif; 
                    ?>
                    <input type="submit" value="Filtrar" class="btn">
                </form>
            </div>
            <div class="col-10 col-lg-10 col-xs-12">
                <?php 
                $qntd = 4; // Define a quantidade de colunas
                include './includes/listar_filmes.php'; 
                ?>
            </div>
        </div>
    </main>
</section>