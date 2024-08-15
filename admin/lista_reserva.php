<?php
    include 'acesso_com.php';
    include '../conn/connect.php';
    

    $lista = $conn->query("SELECT * FROM vw_reservas WHERE status_rotulo = 'Andamento'  ORDER BY data_reserva");
    $row = $lista->fetch_assoc();
    $quant_rows = $lista-> num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <?php include 'menu_adm.php'; ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Lista
                </h2>
                <table class="table table-hover table-condensed tb-opacidade bg-warning">
                    <thead>
                        <th class="hidden">ID</th>
                        <th>Nome do Cliente</th>
                        <th>Motivo da Reserva</th>
                        <th>Numero de Pessoas</th>
                        <th>Stauts da Reserva</th>
                        <th>Dia da Reserva</th>
                        <th>Hora da Reserva</th>
                        <th>Ações</th>
                    </thead>

                    <tbody>
                        <!-- início corpo da tabela -->
                        <!-- início estrutura repetição -->
                        <?php 
                        if ($quant_rows == 0) {
                        } else {
                            do {
                        ?>
                        <tr>
                            <td class="hidden"><?= $row['id'] ?></td>
                            <td><?= $row['nome']; ?></td>
                            <td><?= $row['motivo_reserva']; ?></td>
                            <td><?= $row['numero_pessoas']; ?></td>
                            <td><?= $row['status_rotulo']; ?></td>
                            <td><?= date_format(date_create($row['data_reserva']), 'd/m/Y'); ?></td>
                            <td><?= date_format(date_create($row['data_reserva']), 'H:i'); ?></td>
                            <td>
                                <a href="aprovar_reserva.php?id=<?= $row['cliente_reserva_id'] ?>" role="button"
                                    class="btn btn-success btn-block btn-xs">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    <span class="hidden-xs">Aprovar</span>
                                </a>
                                <button data-nome="<?= $row['nome']; ?>" data-id="<?= $row['cliente_reserva_id']; ?>"
                                    class="delete btn btn-xs btn-block btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    <span class="hidden-xs">Negar</span>
                                </button>
                            </td>
                        </tr>

                        <?php 
                } while ($row = $lista->fetch_assoc());}
                ?>
                    </tbody><!-- final corpo da tabela -->
                </table>
            </div>
        </div>
    </main>
    <!-- inicio do modal para excluir... -->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Vamos deletar?</h4>
                    <button class="close" data-dismiss="modal" type="button">
                        &times;

                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo negar a reserva do cliente <span class="nome text-danger"></span>?
                    for
                </div>
                <form action="negar_reserva.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['cliente_reserva_id'] ?>">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        </span>
                        <textarea name="motivo" id="motivo" cols="30" rows="8" class="form-control"
                            placeholder="Fale o motivo da negação da reserva"></textarea>
                    </div>
                    <div class="modal-footer">
                        <!-- <a href="#" type="button" >
                            
                        </a> -->
                        <input type="submit" value="Confirmar" class="btn btn-danger delete-yes">
                        <button class="btn btn-success" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
$('.delete').on('click', function() {
    var nome = $(this).data('nome'); //busca o nome do cliente (data-nome)
    var id = $(this).data('id'); // busca o id da reserva (data-id)
    //console.log(id + ' - ' + nome); //exibe no console
    $('span.nome').text(nome); // insere o nome do cliente na confirmação
    $('#modalEdit').modal('show'); // chamar o modal
});
</script>

<?php

?>

</html>