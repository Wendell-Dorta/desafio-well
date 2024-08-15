<?php 
    include 'conn/connect.php';
    $idTipo = $_GET['id_tipo'];
    $rotulo = $_GET['rotulo'];
    $listaPorTipo = $conn -> query("SELECT * FROM vw_produtos WHERE tipo_id=$idTipo ORDER BY descricao");
    $rowPorTipo = $listaPorTipo -> fetch_assoc();
    $numLinhas = $listaPorTipo -> num_rows;
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
    <title>Chuleta Quente Churrascaria</title>
</head>

<body class="fundofixo">
    <!-- anuncio reservas -->
    <?php include 'anuncio_reserva.php';?>
    <br><br><br>
    <!-- area de menu -->
    <?php include 'menu_publico.php'; ?>
    <main class="container">

        <a name="home">&nbsp;</a>
        <!-- mostrar se a consulta retorna vazio -->
        <?php if($numLinhas == 0) { ?>
        <h2 class="breadcrumb alert-danger">
            <a href="javascript:window.history.go(-1)" class="btn brn-danger">
                <span class="glyphicon glyphicon-chevron-left"></span>
                Voltar
            </a>

        </h2>'
        <?php } ?>
        <!-- mostrar se a consulta retornou produtos -->
        <?php if($numLinhas > 0) { ?>
        <h2 class="breadcrumb alert-success">
            <a href="javascript:window.history.go(-1)" class="btn brn-danger">
                <span class="glyphicon glyphicon-chevron-left"></span>
                Voltar
            </a>
            <strong><?php echo $rotulo; ?></strong>
        </h2>
        <div class="row">
            <?php do{ ?>
            <!-- mostre -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">

                    <a href="produto_detalhes.php?id=<?php echo $rowPorTipo['id']; ?>">

                        <img class="img-responsive img-rounded" src="images/<?php echo $rowPorTipo['imagem'] ?>"
                            alt="<?php echo $rowPorTipo['descricao']; ?>">
                    </a>

                    <div class="caption ">
                        <h3 class="text-danger">
                            <strong>
                                <?php echo $rowPorTipo['descricao']; ?>
                            </strong>
                        </h3>
                        <p class="text-warning">
                            <strong>
                                <?php echo $rowPorTipo['rotulo']; ?>
                            </strong>
                        </p>
                        <p class="">
                            <?php echo mb_strimwidth($rowPorTipo['resumo'],0,42,'...'); ?>
                        </p>
                        <p class="text-right">
                            <button class="btn btn-default disabled" role="button" style="cursor: default;">
                                <?php echo "R$" . number_format($rowPorTipo['valor'],2,','); ?>
                            </button>
                            <a href="produto_detalhes.php?id=<?php echo $rowPorTipo['id']; ?>">
                                <span class="hidden-xs">Saiba mais...</span>
                                <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </a>
                        </p>
                    </div>
                </div>

            </div>
            <?php } while ($rowPorTipo = $listaPorTipo -> fetch_assoc()); ?>
            <!-- Equivalente ao dr.Read() da classe do C# -->
        </div>
        <?php } ?>
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