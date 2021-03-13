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
        
        $sqlDEL = "DELETE FROM bolos WHERE ID_Bolo = '$ID_Bolo'";

        mysqli_query($link, $sqlDEL) or die("Não foi possível deletar no banco");

        ?>

<body>

                        <script>
                            alert("Bolo deletado com Sucesso")
                            location.href="cad_cardapio.php"
                        </script>
    <?php 
        require('scripts.php');
        ?>
</body>
 

</html>