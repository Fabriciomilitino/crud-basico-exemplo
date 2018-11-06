<?php
    include('inc/conexao.php');

    if(!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['fone']) && !empty($_POST['grupo_id'])) {

        $sql = "UPDATE contatos SET nome = :nome, email = :email, fone = :fone, grupo_id = :grupo WHERE id = :id";

        $inserir = $conexao->prepare( $sql );

        $inserir->bindValue( ':nome', $_POST['nome'] );
        $inserir->bindValue( ':email', $_POST['email'] );
        $inserir->bindValue( ':fone', $_POST['fone'] );
        $inserir->bindValue( ':id', $_POST['id'] );
        $inserir->bindValue( ':grupo', $_POST['grupo_id'] );

        $result = $inserir->execute();

    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/favicon.ico">

    <title>MS_Cad</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/icofont.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/">MS_Cad</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contatos.php">Contatos</a>
            </li>
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link disabled" href="#">Disabled</a>-->
            <!--            </li>-->
            <!--            <li class="nav-item dropdown">-->
            <!--                <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>-->
            <!--                <div class="dropdown-menu" aria-labelledby="dropdown01">-->
            <!--                    <a class="dropdown-item" href="#">Action</a>-->
            <!--                    <a class="dropdown-item" href="#">Another action</a>-->
            <!--                    <a class="dropdown-item" href="#">Something else here</a>-->
            <!--                </div>-->
            <!--            </li>-->
        </ul>
        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>

<main role="main" class="container">

    <div class="row">
        <div class="col">
            <h2>Contatos</h2>
        </div>
    </div>
    <hr>

    <?php if(isset($result) && $result): ?>
    <h3 class="text-center">
        <i class="icofont-ui-check"></i> Contato atualizado com sucesso!</h3>
    <p class="text-center">
        <a href="contatos.php"  >&laquo; Voltar para listagem</a>
    </p>
    <?php endif ?>

    <?php if(isset($result) && !$result): ?>
    <h3 class="text-center text-danger">
        <i class="icofont-close-circled"></i> <?php $inserir->errorInfo()[2] ? $stmt->errorInfo()[2] : 'Erro ao tentar salvar' ?>. Tente novamente!</h3>

    <p class="text-center">
        <a href="javascript:history.go(-1)"  >&laquo; Voltar</a>
    </p>
    <?php endif ?>

    <?php if(!isset($result)): ?>
    <h3 class="text-center text-danger">
        <i class="icofont-close-circled"></i> Favor preencher corretamente o formulário!</h3>

    <p class="text-center">
        <a href="javascript:history.go(-1)"  >&laquo; Voltar</a>
    </p>
    <?php endif ?>

</main>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
