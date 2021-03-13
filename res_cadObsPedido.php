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

        
        $Obs = $_POST['obspedido'];
        $ID_Pedido = $_GET['ID_Pedido'];
        


        $sqlinsert1 = "UPDATE pedido SET ObsPedido='$Obs' WHERE ID_Pedido = '$ID_Pedido'";
        mysqli_query($link, $sqlinsert1) or die('<script>
        alert("Não foi possível salvar no banco")
        location.href="carrinho.php?ID_Pedido='.$ID_Pedido.'"
        </script>'
                                                );
        ?>

<body>
    <?php echo "
            <script>
                location.href='carrinho.php?ID_Pedido=".$ID_Pedido."'
            </script>
   ";
    
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>