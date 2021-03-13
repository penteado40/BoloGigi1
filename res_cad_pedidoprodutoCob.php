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
        $ID_Bolo = $_GET['ID_Bolo'];

        $buscaPreco = "SELECT PrecoCobertura FROM cobertura WHERE ID_Cobertura = '$ID_Cobertura'";

        $resultadoBuscaPreco = mysqli_query($link, $buscaPreco);

        while ($cont = mysqli_fetch_array($resultadoBuscaPreco)) 
        {
             $Preco = $cont['PrecoCobertura'];
        };
        

        $addProduto = "UPDATE pedidodetalhes SET ID_Cobertura = '$ID_Cobertura', Preco_untCob = '$Preco' WHERE ID_Pedido ='$ID_Pedido' AND ID_Bolo = '$ID_Bolo'";
        mysqli_query($link, $addProduto) or die('<script>
        alert("Não foi possível salvar no banco")
       location.href="carrinho.php?ID_Pedido='.$ID_Pedido.'"
        </script>');
        ?>

<body> <?php 
    echo "
                        <script>
                            location.href='carrinho.php?ID_Pedido=".$ID_Pedido."'
                        </script>
   ";



   
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>