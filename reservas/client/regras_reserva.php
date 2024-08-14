<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre a Reserva</title>
    <!-- link css -->
    <link rel="stylesheet" href="../../css/estilo.css">
    <!-- link bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <style>
        /* Adiciona um background branco para o container */
        .container {
            background-color: black;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para o título */
        h1 {
            color: #FFF;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        /* Estilo para os títulos das seções */
        h2 {
            color: #FFF;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        /* Estilo para o texto das seções */
        p {
            color: rgb(221, 214, 214);
            font-size: 1.2em;
            line-height: 1.6;
        }

        ul li {
            color: rgb(221, 214, 214);
        }

        /* Estilo para o botão de reserva */
        .btn-reserva {
            background-color: rgb(223, 4, 4); /* Azul */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hover para o botão */
        .btn-reserva:hover {
            background-color: rgb(148, 0, 0);
            color: white;
        }
    </style>
</head>

<body class="fundofixo">
    <!-- menu publico -->
    <?php include 'menu_reservas.php'; ?>

    <div class="container">
        <h1 class="text-center">Sobre a Reserva</h1>

        <div class="row">
            <div class="col-md-12">
                <section>
                    <h2>Informações Necessárias para Reserva:</h2>
                    <p>
                        Para realizar uma reserva, você precisará fornecer as seguintes informações:
                    </p>
                    <ul>
                        <li>Nome completo</li>
                        <li>CPF</li>
                        <li>E-mail</li>
                    </ul>
                    <p>
                        Seu CPF e e-mail serão utilizados para o login no sistema de reserva, além da criação de uma senha.
                        Certifique-se de fornecer informações precisas para uma reserva bem-sucedida.
                    </p>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <section>
                    <h2>Limite de Reserva:</h2>
                    <p>
                        Cada CPF pode fazer apenas um pedido de reserva por dia.
                    </p>
                </section>
            </div>
            <div class="col-md-6">
                <section>
                    <h2>Política de Reserva</h2>
                    <p>
                        Para garantir a melhor experiência possível, solicitamos que todas as reservas sejam realizadas com
                        antecedência mínima de 24 horas e máxima de 45 dias.
                    </p>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <p>Faça sua reserva</p>
                <a href="faca_reserva.php" class="btn-reserva">Reservas</a>
            </div>
        </div>
    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<!-- arrow function -->
<script type="text/javascript">
    $(document).on('ready', function() {
        $(".regular").slick({
            dots: true,
            infinity: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });

    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/ntm/slick.min.js"></script>

</html>