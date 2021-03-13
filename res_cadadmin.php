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
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        


        $sqlinsert1 = "INSERT INTO admin (EmailAdmin, Nome, Senha, Telefone) VALUES ('$email', '$nome', '$senha', '$telefone')";
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