<?php
    session_start();

    if(isset($_SESSION['authLogin']) && !empty($_SESSION['authLogin'])) {
        //Usuário Logado
    } else {
        //Usuário NÃO Logado
        header('location: /auth/login.php');
    }

 ?>
