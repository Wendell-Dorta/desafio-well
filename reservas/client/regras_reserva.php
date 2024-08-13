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
</head>

<body class="fundofixo">
    <!-- menu publico -->
    <?php include 'menu_reservas.php'; ?>

    <h1>Sobre a Reserva</h1>
    <main class="contaier">
        <section id="">
            <h2><strong>Informações Necessárias para Reserva:</strong></h2>
            <p>
                1- Nome completo
                2- CPF
                3- E-mail

                Seu CPF e e-mail serão utilizados para o login no sistema de reserva, além da criação de uma senha.
                Certifique-se de fornecer informações precisas para uma reserva bem-sucedida.
            </p>
        </section>
        <section>
            <h2><strong>Limite de Reserva:</strong></h2>
            <p>
                Cada CPF pode fazer apenas um pedido de reserva por dia.
            </p>
        </section>
        <section>
            <h2><strong>Política de Reserva</strong></h2>
            <p>
                Para garantir a melhor experiência possível, solicitamos que todas as reservas sejam realizadas com
                antecedência mínima de 24 horas e máxima de 45 dias.
            </p>
        </section>
        <section>
            <p>Faça sua reserva</p>
            <span>
                <strong>
                    <a href="faca_reserva.php">Reservas</a>
                </strong>
            </span>
        </section>
    </main>


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