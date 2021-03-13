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

            $buscaPedido = "SELECT MAX(ID_Pedido) FROM pedido";
            $resultado1 = mysqli_query($link, $buscaPedido);
            while($cont1 = mysqli_fetch_array($resultado1)) {$ID_Pedido = $cont1['MAX(ID_Pedido)'];}
            //recupera os dados enviados atraves do formulário
            //NOME TEMPORÁRIO
            $file_tmp = $_FILES["comprovante"]["tmp_name"];
            //NOME DO ARQUIVO NO COMPUTADOR
            $file_name = $_FILES["comprovante"]["name"];
            //TAMANHO DO ARQUIVO
            $file_size = $_FILES["comprovante"]["size"];
            //MIME DO ARQUIVO
            $file_type = $_FILES["comprovante"]["type"];

            move_uploaded_file($file_tmp);
            
            //lemos o  conteudo do arquivo usando afunção do PHP  file_get_contents
            $binario = file_get_contents($file_tmp);
            // evitamos erro de sintaxe do MySQL
            $binario = mysql_real_escape_string($binario);
            
            $sql = "UPDATE pedido SET Comprovante = '$binario'";
            //executamos a instução SQL

        mysqli_query($link, $sql) or die('<script>
                                                        alert("Não foi possível salvar no banco")
                                                        location.href="carrinho.php?ID_Pedido=$ID_Pedido"
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