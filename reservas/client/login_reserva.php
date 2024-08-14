<?php
    include '../../conn/connect.php';
    // inicia a verificação do login
    if ($_POST) {
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        if (preg_match("/^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$/", $login)) {
            $loginRes = $conn->query("SELECT * FROM vw_clientes WHERE cpf = '$login' AND senha = '$senha' AND ativo = 1");
        } 
        // Verifica se o valor digitado é um e-mail
        else if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $loginRes = $conn->query("SELECT * FROM vw_clientes WHERE email = '$login' AND senha = '$senha' AND ativo = 1");
        } 
        else {
            echo "<script>window.open('invasor.php','_self')</script>";
            exit;
        }
        $rowLogin = $loginRes -> fetch_assoc();
        $numRow = $loginRes->num_rows;
        // verifica se a sessão não existir
        if (!isset($_SESSION)) {
            $sessaoAntiga = session_name('chulettaaaresss');
            session_start();
            $session_name_new = session_name();
        }
        if ($numRow > 0) {
            $_SESSION['login_usuario'] = $login;
            $_SESSION['nivel_usuario'] = $rowLogin['rotulo']; // -> nivel ("-- se tivesse usando fetch_object --")
            $_SESSION['nome_da_sessao'] = session_name();
            if ($rowLogin['rotulo'] == 'Cliente') {
                echo "<script>window.open('index.php','_self')</script>";
            } else {
               echo "<script>window.open('../admin/login.php','_self')</script>";
            }
        }
        else {
            echo "<script>window.open('invasor.php','_self')</script>";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="30;URL=../index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../../css/estilo.css" type="text/css">

    <title>Chuleta Quente - Login Reservas</title>
</head>

<body>
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h1 class="breadcrumb text-info text-center">Faça seu login</h1>
                        <div class="thumbnail">
                            <p class="text-info text-center" role="alert">
                                <i class="fas fa-users fa-10x"></i>
                            </p>
                            <br>
                            <div class="alert alert-info" role="alert">
                                <form action="login_reserva.php" name="form_login" id="form_login" method="POST"
                                    enctype="multipart/form-data">
                                    <label for="login">Login:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="login" id="login" class="form-control" autofocus
                                            required autocomplete="off" placeholder="Digite seu CPF ou Email.">
                                    </p>
                                    <label for="senha">Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info"
                                                aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="senha" id="senha" class="form-control" required
                                            autocomplete="off" placeholder="Digite sua senha.">
                                    </p>
                                    <p class="text-right">
                                        <input type="submit" value="Entrar" class="btn btn-primary">
                                        <a type="button" href="cadastro_cliente.php" class="btn btn-success text-left">Cadastre-se</a>
                                    </p>
                                    <p class="text-left">
                                        
                                    </p>
                                </form>
                                <p class="text-center">
                                    <small>
                                        <br>
                                        Caso não faça uma escolha em 30 segundos será redirecionado automaticamente para
                                        página inicial.
                                    </small>
                                </p>
                            </div><!-- fecha alert -->
                        </div><!-- fecha thumbnail -->
                    </div><!-- fecha dimensionamento -->
                </div><!-- fecha row -->
            </article>
        </section>
    </main>


    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>