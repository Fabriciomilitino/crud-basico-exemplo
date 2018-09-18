<?php
    include('inc/conexao.php');

    if(!empty($_GET['id'])) {
        
        $id =  filter_var($_GET['id']);

        $sql = "SELECT * FROM contatos WHERE id = :id";
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(':id', $id);
        $resultado = $consulta->execute();

        $registro = $consulta->fetch(PDO::FETCH_OBJ);
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
            <h2>Contatos <small>&raquo; Atualização de contato #<?php echo $registro->id ?></small></h2> 
        </div>
    </div>
    <hr>
    <a href="contatos.php" class="btn btn-info btn-sm">&laquo; Listagem</a>
    <form action="contatos_update_save.php" method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $registro->nome ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $registro->email ?>">
                </div>
            </div>
            <div class="col col-2">
                <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="text" class="form-control" name="fone" value="<?php echo $registro->fone ?>">
                </div>
            </div>

            <div class="col-12">
                <input type="hidden" name="id" value="<?php echo $registro->id ?>">
                <button class="btn btn-lg btn-success btn-block">
                    <i class="icofont-save"></i> Salvar</button>
            </div>
               
            
            
            
        </div>
    </form>

</main>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
