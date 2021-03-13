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

        $EmailCliente = $_GET['EmailCliente'];
        
        $sqlDEL = "DELETE FROM cliente WHERE EmailCliente = '$EmailCliente'";

        mysqli_query($link, $sqlDEL) or die("Não foi possível deletar no banco");

        ?>

<body>

                        <script>
                            alert("Cliente deletado com Sucesso")
                            location.href="list_cliente.php"
                        </script>
    <?php 
        require('scripts.php');
        ?>
</body>
 

</html>