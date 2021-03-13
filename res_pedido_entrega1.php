<!doctype html>
<html lang="en">
 
<head>
    <?php 
        include('metas.php');
        include('conexaobd.php');
        ?>
</head>
 
        <?php  

        $ID_Pedido = $_GET['ID_Pedido'];
        $sqlinsert1 = "UPDATE pedido SET Status='Saiu para entrega' WHERE ID_Pedido='$ID_Pedido'";
        mysqli_query($link, $sqlinsert1) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="list_pedido.php"
                                                </script>'
                                                );
        ?>

<body><?php
         echo "
                        <script>
                            location.href='info_pedido.php?ID_Pedido=".$ID_Pedido."'
                        </script>
   ";



     
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>