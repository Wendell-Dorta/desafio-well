<?php 
    include 'acesso_com.php';
    include '../conn/connect.php';

    if ($_GET) {
        $id = $_GET['id'];
        $delete = "DELETE FROM produtos WHERE id = $id";
        $resultado = $conn->query($delete);
        if ($resultado) {
            header('location:produtos_lista.php');
        }
    }
?>