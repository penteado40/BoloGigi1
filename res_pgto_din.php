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
        
        $sqlinsert1 = "UPDATE pedido SET ID_Pagamento = '1' WHERE ID_Pedido = '$ID_Pedido'";
        mysqli_query($link, $sqlinsert1) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="cad_admin.php"
                                                </script>'
                                                );
        ?>

<body>
        <script>
            <?php echo "location.href='carrinho.php?ID_Pedido=$ID_Pedido'"; ?>
            
        </script>




    <?php 
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>