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

        $ID_Cobertura = $_GET['ID_Cobertura'];
        $ID_Pedido = $_GET['ID_Pedido'];
        
        $sqlDEL = "DELETE FROM pedidodetalhes WHERE ID_Cobertura = '$ID_Cobertura' AND ID_Pedido = '$ID_Pedido'";

        mysqli_query($link, $sqlDEL) or die("Não foi possível deletar no banco");

        ?>

<body> <?php 
echo "
                        <script>
                            alert('Cobertura retirado do carrinho com Sucesso')
                            location.href='carrinho.php?ID_Pedido=".$ID_Pedido."'
                        </script>
   ";
        require('scripts.php');
        ?>
</body>
 

</html>