<?php
    include('auth/verificarAutenticacao.php');
    include('inc/conexao.php');

    if(!empty($_POST['id'])) {

        $id =  filter_var($_POST['id']);

        $sql = "DELETE FROM contatos WHERE id = :id";
        $delete = $conexao->prepare($sql);
        $delete->bindParam(':id', $id);

        $resultado = $delete->execute();

        $_SESSION['del'] = $id;
    }

    header('location:contatos.php');
 ?>
