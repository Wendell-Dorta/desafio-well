<?php 
    // arquivo de conexão de banco
    include 'conn/connect.php';

    // consulta para trazer os dados e filtrar
    $id = $_GET['id'];
    $listaDestaque = $conn -> querY("SELECT * FROM vw_produtos WHERE id = $id");
    $linhaDestaque = $listaDestaque -> fetch_assoc();
    $numLinhasDestaque = $listaDestaque -> num_rows;
    
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css -->
    <link rel="stylesheet" href="css/estilo.css">
    <!-- link bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Detalhes Produto</title>
</head>

<body class="fundofixo">
    <!-- area de menu -->
    <?php include 'menu_publico.php'; ?>
    <a name="home">&nbsp;</a>

    <main class="container">
        <!--  -->
        <h2 class="breadcrumb alert-danger">
            <a href="index.php">
                <button class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </button>
                <strong>Detalhes do Produto</strong>
            </a>
        </h2>
        <!--  -->
        <div class="row">
            <?php do{ ?>
            <div class="col-sm-12 col-md-12">
                <div class="thumbnail col-sm-12 col-md-12">
                    <div class="col-sm-4 col-md-4">
                        <a href="">
                            <img src="images/<?php echo $linhaDestaque['imagem']; ?>"
                                alt="<?php echo $linhaDestaque['descricao']; ?>" class="img-responsive img-rounded"
                                style="height:20em;">
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h3 class="text-danger">
                            <strong><?php echo $linhaDestaque['descricao'] ?></strong>
                        </h3>
                        <p class="text-warning">
                            <strong><?php echo $linhaDestaque['rotulo'] ?></strong>
                        </p>
                        <p class="text-center">
                            <strong><?php echo $linhaDestaque['resumo'] ?></strong>
                        </p>
                        <p>
                            <a href="index.php" class="btn btn-danger" whole="button">
                                <span class="hidden-xs">Retornar</span>
                                <span class="visible-xs glyphpicon glyphicon-chevron-left" area-hidden="true"></span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <?php }while ($linhaDestaque = $listaDestaque->fetch_assoc()); ?>
        </div>
        <!-- rodapé -->
        <footer class="panel-footer" style="background: none;">
            <?php include 'rodape.php'; ?>
            <a name="contato"></a>
        </footer>
    </main>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<!-- arrow function -->
<script type="text/javascript">
$(document).on('ready', function() {
    $(".regular").slick({
        dots: true,
        infinity: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });

});
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/ntm/slick.min.js"></script>

</html>