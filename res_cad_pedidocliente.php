<!doctype html>
<html lang="en">
 
<head>
    <?php 
        include('metas.php');
        include('navbar.php');
        include('conexaobd.php');
        ?>
</head>
 
        <?php  
        $EmailCliente = $_GET['EmailCliente'];
        $sqlinsert1 = "INSERT INTO pedido (EmailCliente , ID_Pagamento) VALUES ('$EmailCliente', '1')";
        mysqli_query($link, $sqlinsert1) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="index.php"
                                                </script>'
                                                );
        ?>

<body>
        <script>
            location.href="cad_pedidoprodutoBolo.php"
        </script>




    <?php 
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>