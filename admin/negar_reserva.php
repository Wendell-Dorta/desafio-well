<?php 
    include 'acesso_com.php';
    include '../conn/connect.php';

    $id=$_GET['id'];
    $status = $conn->query("SELECT * FROM `status` WHERE sigla = 'NEG'");
    $rowStatus = $status->fetch_assoc();
    $status_id = $rowStatus['id'];

    $negar = "UPDATE cliente_reserva SET status_id=$status_id WHERE id=$id";
    $resultado = $conn->query($negar);
    if ($resultado) {
        header('location:lista_reserva.php');
    }
?>