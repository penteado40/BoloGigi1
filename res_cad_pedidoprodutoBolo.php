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

        $buscaPreco = "SELECT PrecoBolo FROM bolos WHERE ID_Bolo = '$ID_Bolo'";
        $resultadoBuscaPreco = mysqli_query($link, $buscaPreco);
        while ($cont = mysqli_fetch_array($resultadoBuscaPreco)) 
        {
             $preco = $cont['PrecoBolo'];
        };

        $addProduto = "INSERT INTO pedidodetalhes (ID_Pedido, ID_Bolo, Preco_untBolo, Quantidade) VALUES ('$ID_Pedido','$ID_Bolo', '$preco', '1')";
        mysqli_query($link, $addProduto) or die('<script>
        alert("Não foi possível salvar no banco")
        location.href="carrinho.php?ID_Pedido='.$ID_Pedido.'"
        </script>');
        ?>

<body><?php 

    echo "
                        <script>
                            location.href='cad_pedidoprodutoCobertura.php?ID_Bolo=".$ID_Bolo."'
                        </script>
   ";



    
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>