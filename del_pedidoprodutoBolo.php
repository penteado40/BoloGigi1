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

        $ID_Bolo = $_GET['ID_Bolo'];
        $ID_Pedido = $_GET['ID_Pedido'];
        
        $sqlDEL = "DELETE FROM pedidodetalhes WHERE ID_Bolo = '$ID_Bolo' AND ID_Pedido = '$ID_Pedido'";

        mysqli_query($link, $sqlDEL) or die("Não foi possível deletar no banco");

        ?>

<body> <?php 
echo "
                        <script>
                            alert('Bolo retirado do carrinho com Sucesso')
                            location.href='carrinho.php?ID_Pedido=".$ID_Pedido."'
                        </script>
   ";
        require('scripts.php');
        ?>
</body>
 

</html>