<?php
    include('verificarAutenticacao.php');

    unset($_SESSION['authLogin']);

    header('location: /index.php');
