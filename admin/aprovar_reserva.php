<?php
    include 'acesso_com.php';
    include '../conn/connect.php';

    if ($_POST) {
        
        $id = $_POST['id'];
        $mesa = $_POST['mesa'];
        $numero_reserva = $_POST['numeroReserva'];

        $listaStatus = $conn->query("SELECT * FROM `status` WHERE rotulo = 'Aprovado'");
        $rowStatus= $listaStatus->fetch_assoc();
        $status_id = $rowStatus['id'];

        $update = "UPDATE cliente_reserva SET mesa_id = $mesa, numero_reserva = '$numero_reserva', status_id = $status_id WHERE id = $id";

         $resultado = $conn->query($update);
         if ($resultado) {
            $listaCliente = $conn->query("SELECT * FROM cliente WHERE id = $id");
            $rowCliente = $listaCliente->fetch_assoc();
            $email_enviar = $rowCliente['email'];
            $assunto = "Reserva Aprovada - Chuleta Quente";
            $corpo = "Olá, a sua reserva foi aprovada, o número da sua reserva é $numero_reserva";
            $headers = "From:projetouso2@gmail.com";

            if (mail($email_enviar,$assunto,$corpo,$headers)) {
                echo "Email enviado com sucesso para $email_enviar";
            } else {
                echo "Falha ao enviar o email para $email_enviar";
            }


            //header('location:lista_reserva.php');
         }
    }
    if ($_GET) {
        $id_form = $_GET['id'];
    } else {
        $id_form = 0;
    }
    // recuperando dados da reserva
    $lista = $conn->query("SELECT * FROM vw_reservas WHERE cliente_reserva_id = $id_form");
    $row = $lista->fetch_assoc();

    // gerando numero da reserva
    $numero = rand(44444,99999);
    $gera_reserva = "RES"."-".$row['cliente_reserva_id'].$numero.$row['id_do_cliente'];

    // selecionar a lista de tipos para preencher o <select>
    $listaTipo = $conn->query("SELECT * FROM mesas ORDER BY numero ASC");
    $rowTipo = $listaTipo->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Aprovar Reserva</title>
</head>

<body>
    <?php include "menu_adm.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a href="lista_reserva.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Aceitando Reserva
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="aprovar_reserva.php" method="post" name="form_insere"
                            enctype="multipart/form-data" id="form_insere">
                            <!-- campo id deve permanecer oculto("type=hidden") ao usuário -->
                            <input type="hidden" name="id" id="id" value="<?= $row['cliente_reserva_id']; ?>">

                            <label for="id_tipo">Mesa:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="mesa" id="mesa" class="form-mesa" required>
                                    <?php do { ?>
                                    <option value="<?php echo $rowTipo['numero'] ?>">
                                        <?php echo $rowTipo['numero']." - "."Capacidade: ".$rowTipo['capacidade'] ?>
                                    </option>
                                    <?php } while ($rowTipo =$listaTipo->fetch_assoc()); ?>
                                </select>
                            </div>
                            <label for="destaque">Numero da Reserva:</label>
                            <div class="input-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                    </span>
                                    <input type="text" name="exibeNumeroReserva" id="exibeNumeroReserva"
                                        class="form-control" placeholder="numero da reserva" maxlength="100"
                                        value="<?= $gera_reserva; ?>" disabled style="cursor:default;">
                                    <input type="hidden" name="numeroReserva" id="numeroReserva"
                                        value="<?= $gera_reserva; ?>">
                                </div>
                            </div>
                            <br>
                            <input type="submit" name="aprovar" id="aprovar" class="btn btn-danger btn-block"
                                value="Aprovar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>