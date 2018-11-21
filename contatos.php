<?php
    include('auth/verificarAutenticacao.php');
    include('inc/conexao.php');

    $sql = "SELECT c.*, g.nome AS grupo FROM contatos c LEFT JOIN grupos g ON g.id = c.grupo_id ORDER BY c.id DESC";
    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    $registros = $consulta->fetchAll(PDO::FETCH_OBJ);
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
            <h2>Contatos
                <a href="contatos_cad.php" class="btn btn-primary btn-sm">Adicionar contato</a>
            </h2>

            <?php if(isset($_SESSION['del']) && $_SESSION['del']): ?>
            <div class="alert alert-dismissible alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>

                O registro #<?php echo $_SESSION['del'] ?> foi excluindo.
            </div>
            <?php unset($_SESSION['del']) ?>
            <?php endif ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Grupo</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th width="1">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($registros as $r): ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $r->grupo ?></td>
                        <td>
                            <?php echo $r->nome ?>

                            <?php if(isset($_SESSION['new'][$r->id])): ?>
                                <span class="badge badge-warning">Novo</span>
                            <?php if($_SESSION['new'][$r->id] < 7) { ($_SESSION['new'][$r->id]++); } else { unset($_SESSION['new'][$r->id]); } ?>
                            <?php endif ?>
                        </td>
                        <td><?php echo $r->fone ?></td>
                        <td><?php echo $r->email ?></td>
                        <td class="no-wrap">
                            <form id="form_<?php echo $r->id ?>" action="contatos_delete.php" method="post" onsubmit="">
                                <a href="contatos_update.php?id=<?php echo $r->id ?>" class="btn btn-secondary active">
                                    <i class="icofont-edit"></i> Atualizar</a>

                                <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                <button type="button" class="btn btn-secondary active excluir" data-name="<?php echo $r->nome ?>" data-id="<?php echo $r->id ?>">
                                    <i class="icofont-ui-delete"></i> Excluir</button>
                            </form>

                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.29/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function(){

        $('.excluir').click(function(){

            var id = $(this).attr('data-id'),
                nome = $(this).attr('data-name');

            const swalWithBootstrapButtons = swal.mixin({
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            });

            swalWithBootstrapButtons({
                title: 'Deseja excluir o contato "' + nome + '"?',
                text: "Essa ação não poderá ser desfeita!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, excluir item!',
                cancelButtonText: 'Não, cancelar!',
                reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $('#form_' + id).submit();
                        // swalWithBootstrapButtons(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )
                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        // swalWithBootstrapButtons(
                        // 'Cancelled',
                        // 'Your imaginary file is safe :)',
                        // 'error'
                        // )
                    }
            })
        });
    });
</script>
</body>
</html>
