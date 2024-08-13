<?php 
    // nome da sessão
    session_name('chulettaaa');
    if (!isset($_SESSION)) {
        session_start(); // inicia sessão
    }
  
    // segurança digital
  
    // verificar se o usuarios etá logado
    if (!isset($_SESSION['login_usuario'])) {
        // se não existir, redirecionar a sessão por segurança
        header('location: login_reserva.php'); // redirecionar para login
        exit;
    }
    $nome_da_sessao = session_name();
    if (!isset($_SESSION['nome_da_sessao']) or ($_SESSION['nome_da_sessao'] != $nome_da_sessao)) {
        session_destroy();
        header('location: login_reserva.php');
    }
?>