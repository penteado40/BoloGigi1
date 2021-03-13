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

        $EmailAdmin = $_GET['EmailAdmin'];
        
        $sqlDEL = "DELETE FROM admin WHERE EmailAdmin = '$EmailAdmin'";

        mysqli_query($link, $sqlDEL) or die("Não foi possível deletar no banco");

        ?>

<body>

                        <script>
                            alert("Usuário deletado com Sucesso")
                            location.href="cad_admin.php"
                        </script>
    <?php 
        require('scripts.php');
        ?>
</body>
 

</html>