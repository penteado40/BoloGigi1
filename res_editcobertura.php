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

        $ID_Cobertura = $_POST['ID_Cobertura'];
        $Sabor = $_POST['sabor'];
        $Obs = $_POST['obs'];
        $Preco = $_POST['preco'];
        
        $sqlinsert1 = "UPDATE cobertura SET SaborCobertura='$Sabor', Obs='$Obs', PrecoCobertura='$Preco' WHERE ID_Cobertura='$ID_Cobertura'";
        mysqli_query($link, $sqlinsert1) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="cad_cardapio.php"
                                                </script>'
                                                );
        ?>

<body>
        <script>
            alert("Cobertura salvo com Sucesso")
            location.href="cad_cardapio.php"
        </script>




    <?php 
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>