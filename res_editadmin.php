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

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $EmailAdmin = $_POST['email'];
        $senha = $_POST['senha'];
        


        $sqlinsert1 = "UPDATE admin SET Telefone='$telefone', Nome='$nome', Senha='$senha' WHERE EmailAdmin='$EmailAdmin'";
        mysqli_query($link, $sqlinsert1) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="cad_admin.php"
                                                </script>'
                                                );
        ?>

<body>
        <script>
            alert("Usuário salvo com Sucesso")
            location.href="cad_admin.php"
        </script>




    <?php 
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>