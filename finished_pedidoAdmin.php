<!doctype html>
<html lang="en">
 
<head>
    <?php 
        require("metas.php");
        require("navbar.php");
        include('conexaobd.php');
        $ID_Pedido = $_GET['ID_Pedido'];
        ?>
</head>

<body class="">

    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <a href="index.php" class="link"><img src="assets/images/logo-full.png" alt="" class="img-fluid mb-4"></a>
                            <h4 class="mb-3 f-w-400">Seu pedido foi cadastrado com Sucesso e está sendo analisado.</h4>
                            <h5 class="mb-3 f-w-400">Os pedidos são preparados a partir das 13h</h5>
                            
                            <p><a href="index.php" class="link">Página Inicial</a></p>
                            <p><a href="list_pedido.php" class="link">Pedidos</a></p>
                        </div>
                    </div>
                </div>
            </div>

    <?php 
        require('scripts.php');
        ?>
</body>
 

</html>