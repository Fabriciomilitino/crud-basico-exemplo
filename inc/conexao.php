<?php
    $HOST = "localhost"; //servidor onde esta instalado o Mysql
    //localhost = servidor local
    //caso não esteja local colocar o ip

    $USER = "crud_ms_user"; //usuário criado no banco de dados
    $PASSWORD = "crud@2006"; //senha do usuário

    $DATABASE = "crud_ms_db"; //base de dados que será acessada

    //Tenta conectar e selecionar o banco de dados
    $conexao = new PDO('mysql:host=' . $HOST . ';dbname=' . $DATABASE . ';charset=utf8', $USER, $PASSWORD);
