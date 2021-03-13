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

        $Sabor = $_POST['sabor'];
        $Obs = $_POST['obs'];
        $Preco = $_POST['preco'];
        


        $sqlinsert1 = "INSERT INTO bolos (SaborBolo, Obs, PrecoBolo) VALUES ('$Sabor', '$Obs', '$Preco')";
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