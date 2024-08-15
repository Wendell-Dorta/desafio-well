<?php 
    // colocar o mesmo nome de variavel de outro arquivo pode dar ruim, ja que estão sendo incluidos no index
    include 'conn/connect.php';
    $lista = $conn -> query("SELECT * FROM vw_produtos WHERE destaque=1 ORDER BY descricao");
    $row_produtos = $lista -> fetch_assoc();
    $num_linhas = $lista -> num_rows;
?>

<!-- mostrar se a consulta retorna vazio -->
<?php if($num_linhas == 0) { ?>
<h2 class="breadcrumb alert-danger">
    Não há produtos em destaque!
</h2>'
<?php } ?>
<!-- o php neste trecho de linha 10 a 12, é igual como o compilador ve no C#, vai linha a linha e vendo o codigo, e como o php so entende php, ele só vai ver o php, assim podendo abrir uma chave em uma tag php, e fechando em outra, fazer é isto e bom por conta que evita concatenação, ja que o html entre as 2 tags so sera exibido se a condição for verdadeira -->

<!-- mostrar se a consulta retornou produtos -->
<?php if($num_linhas > 0) { ?>
<h2 class="breadcrumb alert-success">
    Produtos em Destaque
</h2>
<div class="row">
    <?php do{ ?>
    <!-- mostre -->
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">

            <a href="produto_detalhes.php?id=<?php echo $row_produtos['id']; ?>">

                <img class="img-responsive img-rounded" src="images/<?php echo $row_produtos['imagem'] ?>"
                    alt="<?php echo $row_produtos['descricao']; ?>">
            </a>

            <div class="caption ">
                <h3 class="text-danger">
                    <strong>
                        <?php echo $row_produtos['descricao']; ?>
                    </strong>
                </h3>
                <p class="text-warning">
                    <strong>
                        <?php echo $row_produtos['rotulo']; ?>
                    </strong>
                </p>
                <p class="">
                    <?php echo mb_strimwidth($row_produtos['resumo'],0,42,'...'); ?>
                </p>
                <p class="text-right">
                    <button class="btn btn-default disabled" role="button" style="cursor: default;">
                        <?php echo "R$" . number_format($row_produtos['valor'],2,','); ?>
                    </button>
                    <a href="produto_detalhes.php?id=<?php echo $row_produtos['id']; ?>">
                        <span class="hidden-xs">Saiba mais...</span>
                        <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                    </a>
                </p>
            </div>
        </div>

    </div>
    <?php } while ($row_produtos = $lista -> fetch_assoc()); ?>
    <!-- Equivalente ao dr.Read() da classe do C# -->
</div>
<?php } ?>