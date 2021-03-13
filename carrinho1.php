<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    	require("metas.php");
		require("navbar.php");
    	require("menu.php");
        include('conexaobd.php');

        $ValorFrete = 0;
        $SubTotalBolo=0;
        $SubTotalCobertura = 0;
        $ValorFinal = 0;
        $SubTotal = 0;
        $ID_PedidoGET = $_GET['ID_Pedido'];
        $buscaPedido = "SELECT MAX(ID_Pedido) FROM pedido";
        $resultado1 = mysqli_query($link, $buscaPedido);
        if ($ID_PedidoGET == 0) {
            while($cont1 = mysqli_fetch_array($resultado1)) {$ID_Pedido = $cont1['MAX(ID_Pedido)'];}
        }else{$ID_Pedido = $ID_PedidoGET;}

        $buscaObs = "SELECT ObsPedido FROM pedido WHERE ID_Pedido = '$ID_Pedido'";
        $resultado2 = mysqli_query($link, $buscaObs);
        while($cont3 = mysqli_fetch_array($resultado2)) {$ObsPedido = $cont3['ObsPedido'];}
                                                
        $sqlBolo = "
        SELECT pedidodetalhes.ID_Pedido, pedidodetalhes.ID_Bolo, pedidodetalhes.Preco_untBolo, pedidodetalhes.Obs, pedidodetalhes.Quantidade, pedido.ID_Pedido, pedido.EmailCliente, bolos.ID_Bolo, bolos.SaborBolo, bolos.PrecoBolo
        FROM pedidodetalhes
        INNER JOIN pedido ON pedidodetalhes.ID_Pedido = pedido.ID_Pedido
        INNER JOIN bolos ON pedidodetalhes.ID_Bolo = bolos.ID_Bolo
        WHERE pedidodetalhes.ID_Pedido = '$ID_Pedido'
        ";
        
        $sqlCobertura = "
        SELECT pedidodetalhes.ID_Pedido, pedidodetalhes.ID_Cobertura, pedidodetalhes.Preco_untCob, pedidodetalhes.Obs, pedidodetalhes.Quantidade, pedido.ID_Pedido, cobertura.ID_Cobertura, cobertura.PrecoCobertura, cobertura.SaborCobertura
        FROM pedidodetalhes
        INNER JOIN pedido ON pedidodetalhes.ID_Pedido = pedido.ID_Pedido
        INNER JOIN cobertura ON pedidodetalhes.ID_Cobertura = cobertura.ID_Cobertura
        WHERE pedidodetalhes.ID_Pedido = '$ID_Pedido'
        ";

        $sqlCliente = "
        SELECT pedidodetalhes.ID_Pedido, pedido.ID_Pedido, pedido.EmailCliente, cliente.Emailcliente, cliente.NomeCompleto, cliente.Telefone, cliente.Endereco, cliente.Ncasa, cliente.Cidade
        FROM pedidodetalhes
        INNER JOIN pedido ON pedidodetalhes.ID_Pedido = pedido.ID_Pedido
        INNER JOIN cliente ON pedido.EmailCliente = cliente.EmailCliente
        WHERE pedidodetalhes.ID_Pedido = '$ID_Pedido'
        ORDER BY pedidodetalhes.ID_Pedido ASC";

        $sqlPgto = "
        SELECT pedido.ID_Pedido, pedido.ID_Pagamento, pagamento.ID_Pagamento, pagamento.Descricao
        FROM pedido
        INNER JOIN pagamento ON pedido.ID_Pagamento = pagamento.ID_Pagamento
        WHERE pedido.ID_Pedido = '$ID_Pedido'";

        $resultadoBolo = mysqli_query($link, $sqlBolo);
        $resultadoCobertura = mysqli_query($link, $sqlCobertura);
        $resultadoCliente = mysqli_query($link, $sqlCliente);
        $resultadoPgto = mysqli_query($link, $sqlPgto);

        while($cont = mysqli_fetch_array($resultadoCliente)) {
            
            $EmailCliente = $cont['EmailCliente'];
            $NomeCompleto = $cont['NomeCompleto'];
            $Telefone = $cont['Telefone'];
            $Endereco = $cont['Endereco'];
            $Ncasa = $cont['Ncasa'];
            $Cidade = $cont['Cidade'];

            
            }

        while($cont = mysqli_fetch_array($resultadoPgto)) {$Descricao = $cont['Descricao'];}
     

      ?>
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ Header ] start -->
	
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            
            <div class="col-sm-12"> <!-- Listagem dos produtos cadastrados nesse pedido -->
                <div class="card">
                    <div class="card-header">
                        <?php  echo" <h5>Pedido referente ao cliente: $NomeCompleto</h5> ";?>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#bolos" role="tab" aria-controls="home" aria-selected="true">Bolo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#coberturas" role="tab" aria-controls="profile" aria-selected="false">Cobertura</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="bolos" role="tabpanel" aria-labelledby="home-tab">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Sabor Bolo</th>
                                                        <th>Preco Bolo</th>
                                                        <th>Obs</th>
                                                        <th>Quantidade</th>
                                                        <th>Excluir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    while($cont = mysqli_fetch_array($resultadoBolo)) {
                                                        $PrecoBolo = $cont['PrecoBolo'];
                                                        $Quantidade = $cont['Quantidade'];
                                                        $SubTotalBolo += $PrecoBolo;
                                                        if ($Quantidade == 0) {$Quantidade = '';}else {$Quantidade = $cont['Quantidade'];}
                                                       echo "
                                                        <tr>
                                                            <td>".$cont['SaborBolo']."</td>
                                                            <td>R$".$PrecoBolo.",00</td>
                                                            <td>".$cont['Obs']."</td>
                                                            <td><input type='text' class='text-quant' name='quant' value='".$Quantidade."'></td>
                                                            <td><a href='del_pedidoprodutoBolo.php?ID_Bolo=".$cont['ID_Bolo']."&ID_Pedido=".$ID_Pedido."'><i class='fas fa-trash-alt link'></i></a></td>
                                                        </tr>

                                                    "  ;
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                       
                                    </div><!-- 
                                    <?php  echo" <h5 class='card-title'>SubTotal de Bolos: $SubTotalBolo</h5>";?> -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="coberturas" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Sabor Cobertura</th>
                                                        <th>Preco Cobertura</th>
                                                        <th>Obs</th>
                                                        <th>Quantidade</th>
                                                        <th>Excluir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                while($cont = mysqli_fetch_array($resultadoCobertura)) {
                                                        $PrecoCobertura = $cont['PrecoCobertura'];
                                                        $Quantidade = $cont['Quantidade'];
														if ($Quantidade == 0) {$Quantidade = '';}else {$Quantidade = $cont['Quantidade'];}
                                                        if ($PrecoCobertura != 0) {
                                                        	$SubTotalCobertura += $PrecoCobertura;
                                                        }
                                                        echo "
                                                        <tr>
                                                            <td>".$cont['SaborCobertura']."</td>
                                                            <td>R$".$cont['PrecoCobertura'].",00</td>
                                                            <td>".$cont['Obs']."</td>
                                                             <td><input type='text' class='text-quant' name='quant' value='".$Quantidade."'></td>
                                                            <td><a href='del_pedidoprodutoCob.php?ID_Cobertura=".$cont['ID_Cobertura']."&ID_Pedido=".$ID_Pedido."'><i class='fas fa-trash-alt link'></i></a></td>
                                                        </tr>

                                                    "  ;
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- 
                                     <?php  echo" <h5 class='card-title'>SubTotal de Coberturas: $SubTotalCobertura</h5>";?> -->
                                </div>
                            </div>
                        </div>
                        <?php
                            $SubTotal = $SubTotalBolo + $SubTotalCobertura;
                            echo" <h5>SubTotal: R$$SubTotalBolo,00 + R$$SubTotalCobertura,00 = R$$SubTotal,00</h5>
                            <a href='cad_pedidoprodutoBolo.php' class='btn  btn-primary'>Adicionar Bolo</a>
                            <a href='cad_pedidoprodutoCobertura.php' class='btn  btn-primary'>Adicionar Cobertura</a>
                            <a href='res_cad_pedidoprodutoCob.php?ID_Cobertura=10&ID_Pedido=".$ID_Pedido."' class='btn  btn-primary'><i class='far fa-plus-square'></i> Bolo sem cobertura</a>
                                    ";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> <!-- Entrega -->
                <div class="card">
                    <div class="card-header">
                       <h5>Tipo de entrega:</h5>
                    </div>
                    <div class="card-body">
                        <label>Calcular Frete</label>
                            <form method="GET" action="calcularfrete.php">
                                <div class="form-group">
                                    <input type="text" class="form-control cep" placeholder="00000-000" name="destino">
                                </div>
                                <button type="submit" class="btn  btn-primary">Calcular Frete</button>
                            </form>
                    </div>
                     <div class="card-footer">
                     	<?php 
                                if ($ValorFrete == 0) {$ValorFrete = 0;}
                                    
                                echo"<h5>Valor do frete: $ValorFrete</h5> ";
                                ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> <!-- Informações do Cliente -->
                <div class="card">
                    <div class="card-header">
                        <h5>Informações do Cliente</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="email" value="<?php echo $EmailCliente ?>" readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" class="form-control" placeholder="" name="nome" value="<?php echo $NomeCompleto ?>" readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" placeholder="" name="telefone" value="<?php echo $Telefone ?>" readonly="true">
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" placeholder="" name="endereco" value="<?php echo $Endereco ?>" readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Nº Casa</label>
                                        <input type="text" class="form-control" placeholder="" name="ncasa" value="<?php echo $Ncasa ?>" readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" placeholder="" name="cidade" value="<?php echo $Cidade ?>" readonly="true">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> <!-- Pagamento -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Valor Final</h5>
                        <?php
                            $ValorFinal = $SubTotal + $ValorFrete;
                            echo" <h5 class='card-text'>R$$ValorFinal,00</h5>";
                            if ($Descricao == '') {
                            	echo "<h5 class='card-title'>Nenhum método de pagamento foi selecionado:</h5>"; 
                            }else if ($Descricao != ""){echo "<h5 class='card-title'>Pagamento selecionado: $Descricao</h5>"; }

                            
                        ?>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#transferencia" role="tab" aria-controls="pills-home" aria-selected="true">Transferência</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#dinheiro" role="tab" aria-controls="pills-profile" aria-selected="false">Dinheiro</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="transferencia" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <form method="POST" action="res_upload.php">
                                            <input type="file" name="comprovante">
                                            <input type="submit" class='btn  btn-primary'>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="dinheiro" role="tabpanel" aria-labelledby="pills-profile-tab">
                               <?php
                                    $ValorFinal = $SubTotal + $ValorFrete;
                                    echo"<a href='res_pgto_din.php?ID_Pedido=$ID_Pedido' class='btn  btn-primary'>Pagar com Dinheiro</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> <!-- Informações do Cliente -->
                <div class="card">
                	<div class="card-header">
                        <h5>Observação:</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php echo "<form method='POST' action='res_cadObsPedido.php?ID_Pedido=".$ID_Pedido."'> 
                                    <div class='form-group'>
                                        <input type='text' class='form-control' name='obspedido' value='".$ObsPedido."'>
									</div>
                                    <button type='submit' class='btn  btn-primary'>Adicionar</button>
                                </form>";?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        <?php echo "<a href='cancel_pedido.php' data-confirm='Tem certeza de que deseja cancelar o pedido?' class='btn  btn-primary'>Cancelar</a>
                                    <a href='cad_pedidoproduto.php' class='btn  btn-primary'>Continuar Comprando</a>
                                    <a href='carrinho_final.php?ID_Pedido=".$ID_Pedido."' data-confirm='Tem certeza de que deseja finalizar o pedido?' class='btn  btn-primary'>Finalizar Compra</a>
                                    "?>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
<?php require("scripts.php") ?>
</body>

</html>
