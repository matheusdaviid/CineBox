<?php

include './includes/header.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    include './includes/filmes_detalhe.php';
} else {
}

include_once './includes/footer.php'

?>