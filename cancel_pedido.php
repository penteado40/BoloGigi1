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

        $ID_Pedido = $_GET['ID_Pedido'];
        
        $sqlDEL = "DELETE FROM pedido WHERE ID_Pedido = '$ID_Pedido'";
        $sqlDEL1 = "DELETE FROM pedidodetalhes WHERE ID_Pedido = '$ID_Pedido'";

        mysqli_query($link, $sqlDEL) or die("Não foi possível deletar no banco");
        mysqli_query($link, $sqlDEL1) or die("Não foi possível deletar no banco");

        ?>

<body>

                        <script>
                            alert("Pedido cancelado Sucesso")
                            location.href="index.php"
                        </script>
    <?php 
        require('scripts.php');
        ?>
</body>
 

</html>