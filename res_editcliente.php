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
        $sqlinsert1 = "UPDATE cliente SET NomeCompleto='$nome', Telefone='$telefone', Endereco='$endereco', Ncasa='$ncasa', Cidade='$cidade' WHERE EmailCliente='$email'";
        mysqli_query($link, $sqlinsert1) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="list_cliente.php"
                                                </script>'
                                                );
        ?>

<body>
        <script>
            alert('Usuário salvo com Sucesso')
            location.href='list_cliente.php'
        </script>"
        
            
        




    <?php /*
        require('scripts.php');
        require('footer.php');*/
        ?>
</body>
 

</html>