<?php 
    $host = "localhost";
    $database = "tincphpdb02";
    $user = "root";
    $pass = ""; 
    $charset = "utf8";
    $port = "3306";

    try {    
        $conn = new mysqli($host,$user,$pass,$database,$port);
        mysqli_set_charset($conn,$charset);
        
    } catch (Throwable $th) {
        die ("Antenção rolou um ERRO, Cara!: " . $th);

    }
?>