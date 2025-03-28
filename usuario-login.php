<?php

include './includes/header.php';


if($_SERVER["REQUEST_METHOD"] =='POST'&& !empty($_POST)){

    $usuario_form=$_POST['usuario'];
    $usuario_senha=$_POST['senha'];

    $dsn = 'mysql:dbname=db_cinebox;host=127.0.0.1';
    $user = 'root'; 
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $script="SELECT * FROM tb_usuario WHERE usuario ='{$usuario_form}' AND senha ='{$usuario_senha}'";
    
    $resultado=$banco->query($script)->fetch();

    if(!empty($resultado) && $resultado !=false){
       
        $select_usuario="SELECT *FROM  tb_pessoa WHERE id ={$resultado['id_pessoa']}";
        $dados_usuario=$banco->query($select_usuario)->fetch();

        session_start();

       $_SESSION['id_pessoa']     = $dados_usuario['id'];
       $_SESSION['nome']          = $dados_usuario['nome'];
       $_SESSION['ano_nascimento']= $dados_usuario['ano_nascimento'];
       $_SESSION['telefone_1']    = $dados_usuario['telefone_1'];
       
       
       
       
       
       
        header('location:usuario.php');
    } else {
        echo'<script>
        alert("Usuario ou Senha não encontrado");
        window.location.replace="./usuario-login.php";
        
        </script>';
    }
    
    
};


include './includes/user_login.html';

include_once './includes/footer.php';
