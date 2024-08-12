<?php
   include "../admin/acesso_com.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Área de Cliente - Chuleta Quente</title>
</head>

<body class="container">
    <h2>
        <strong><?php echo $_GET['cliente']; ?></strong>, Bem Vindo à área de cliente
    </h2>

    <a href="../admin/logout.php">
        <span class="glyphicon glyphicon-log-out"></span>
    </a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/ntm/slick.min.js"></script>
</html>