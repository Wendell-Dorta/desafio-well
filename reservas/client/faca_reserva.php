<?php
    include 'acesso_res.php';
    include '../../conn/connect.php';

    
    if ($_POST) {
        $data = $_POST['data'];
        $numPessoas = $_POST['numPessoas'];
        $motivo = $_POST['motivo'];

        $insereReserva = "INSERT INTO reservas (data_reserva,numero_pessoas,motivo_reserva,ativo) VALUES ('$data',$numPessoas,'$motivo',DEFAULT)";
        $resultado = $conn->query($insereReserva);
        $idReserva = mysqli_insert_id($conn);
        
        if (isset($_SESSION['login_usuario'])) {
            $cliente_id = $_SESSION['id_cliente'];
        }
        
        $insereClienteReserva = "INSERT INTO cliente_reserva (cliente_id, status_id,reserva_id,data_reserva_feita) VALUES ($cliente_id,1,$idReserva,DEFAULT)";
        $resultado = $conn->query($insereClienteReserva);
        if (mysqli_insert_id($conn)) {
            header('location:lista_reservas.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/estilo.css">
    <title>Fazer Reservas</title>
</head>

<body>
    <?php include "menu_reservas.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    FAZENDO RESERVAS
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="faca_reserva.php" method="post" name="form_insere" enctype="multipart/form-data"
                            id="form_insere">
                            <label for="destaque">Data e Hora:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="datetime-local" name="data" id="data" class="form-control" placeholder=>
                            </div>
                            <label for="descricao">Numero Pessoas:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="numPessoas" id="numPessoas" class="form-control"
                                    placeholder="Digite a quantidade de pessoas*" required>
                            </div>

                            <label for="resumo">Motivo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <textarea name="motivo" id="motivo" cols="30" rows="8" class="form-control"
                                    placeholder="Digite o motivo da reserva"></textarea>
                            </div>

                            <br>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block"
                                value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>