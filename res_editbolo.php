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

        $ID_Bolo = $_POST['ID_Bolo'];
        $Sabor = $_POST['sabor'];
        $Obs = $_POST['obs'];
        $Preco = $_POST['preco'];
        
        $sqlinsert1 = "UPDATE bolos SET SaborBolo='$Sabor', Obs='$Obs', PrecoBolo='$Preco' WHERE ID_Bolo='$ID_Bolo'";
        mysqli_query($link, $sqlinsert1) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="cad_cardapio.php"
                                                </script>'
                                                );
        ?>

<body>
        <script>
            alert("Bolo salvo com Sucesso")
            location.href="cad_cardapio.php"
        </script>




    <?php 
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>