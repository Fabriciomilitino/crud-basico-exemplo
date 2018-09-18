<?php
    $HOST = "127.0.0.1"; //servidor onde esta instalado o Mysql
    //localhost = servidor local
    //caso não esteja local colocar o ip

    $USER = "root"; //usuário criado no banco de dados
    $PASSWORD = "root"; //senha do usuário

    $DATABASE = "contatos_app"; //base de dados que será acessada

    //Tenta conectar e selecionar o banco de dados
    $conexao = new PDO('mysql:host=' . $HOST . ';dbname=' . $DATABASE, $USER, $PASSWORD);