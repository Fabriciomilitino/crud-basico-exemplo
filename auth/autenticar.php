<?php
    session_start();
    include('../inc/conexao.php');

    if(empty($_POST['login']) || empty($_POST['senha'])) {
        echo $mensagem = 'Favor preencher os dados de login corretamente';
    } else {

        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $palavra_chave = 'ads_web_v_';
        $senha = hash('sha256', $palavra_chave . $senha);

        $sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";

        $consulta = $conexao->prepare( $sql );
        $consulta->bindParam( ':login', $login );
        $consulta->bindParam( ':senha', $senha );

        $resultado = $consulta->execute();

        if($resultado && $consulta->rowCount() == 1){
            $usuario = $consulta->fetch(PDO::FETCH_OBJ);

            $_SESSION['authLogin'] = $usuario->nome;
            $_SESSION['authPerfil'] = 'admin';

            header('location: /index.php');
        } else {
            echo $mensagem = 'Usuário e/ou senha incorretas. Tente novamente!';
        }
    }
