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
        $endereco = $_POST['endereco'];
        $ncasa = $_POST['ncasa'];
        $cidade = $_POST['cidade'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        


        $sqlinsert1 = "INSERT INTO cliente (EmailCliente, Senha, NomeCompleto, Telefone, Endereco, Ncasa, Cidade) VALUES ('$email', '$senha', '$nome', '$telefone', '$endereco', '$ncasa', '$cidade')";
        mysqli_query($link, $sqlinsert1) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="cad_cliente.php"
                                                </script>'
                                                );
        ?>

<body>
        <script>
            alert("Cliente salvo com Sucesso")
            location.href="list_cliente.php"
        </script>




    <?php 
        require('scripts.php');
        require('footer.php');
        ?>
</body>
 

</html>