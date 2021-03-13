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
        $ValorFinal = $_GET['ValorFinal'];

        $sqlPedido = "UPDATE pedido SET ValorFinal = '$ValorFinal', Status = 'Em Analise' WHERE ID_Pedido='$ID_Pedido' ";
        mysqli_query($link, $sqlPedido) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="index.php"
                                                </script>'
                                                );
        ?>

<body><?php echo"
        <script>
             location.href='finished_pedido.php?ID_Pedido=".$ID_Pedido."'
        </script>
";



    
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>