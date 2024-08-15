<?php 
    include 'acesso_com.php';
    include '../conn/connect.php';

    if ($_POST) {
        $id = $_POST['id'];
        $motivo = $_POST['motivo'];
        $status = $conn->query("SELECT * FROM `status` WHERE rotulo = 'Negado'");
        $rowStatus = $status->fetch_assoc();
        $status_id = $rowStatus['id'];

        $delete = "UPDATE cliente_reserva SET status_id = $status_id, motivo_cancelamento = '$motivo' WHERE id = $id";
        $resultado = $conn->query($delete);
        if ($resultado) {
            header('location:lista_reserva.php');
        }
    }
?>