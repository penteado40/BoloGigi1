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

        $buscaObs = "SELECT ObsPedido, Status FROM pedido WHERE ID_Pedido = '$ID_Pedido'";
        $resultado2 = mysqli_query($link, $buscaObs);
        while($cont3 = mysqli_fetch_array($resultado2)) {$ObsPedido = $cont3['ObsPedido']; $Status=$cont3['Status'];}
                                             
        $sqlBolo = "
        SELECT pedidodetalhes.ID_Pedido, pedidodetalhes.ID_Bolo, pedidodetalhes.Preco_untBolo, pedidodetalhes.Obs, pedidodetalhes.Quantidade, pedido.ID_Pedido, pedido.EmailCliente, bolos.ID_Bolo, bolos.SaborBolo, bolos.PrecoBolo
        FROM pedidodetalhes
        INNER JOIN pedido ON pedidodetalhes.ID_Pedido = pedido.ID_Pedido
        INNER JOIN bolos ON pedidodetalhes.ID_Bolo = bolos.ID_Bolo
        WHERE pedidodetalhes.ID_Pedido = '$ID_Pedido'
        ORDER BY pedidodetalhes.ID_Pedido ASC";
        
        $sqlCobertura = "
        SELECT pedidodetalhes.ID_Pedido, pedidodetalhes.ID_Cobertura, pedidodetalhes.Preco_untCob, pedidodetalhes.Obs, pedidodetalhes.Quantidade, pedido.ID_Pedido, cobertura.ID_Cobertura, cobertura.PrecoCobertura, cobertura.SaborCobertura
        FROM pedidodetalhes
        INNER JOIN pedido ON pedidodetalhes.ID_Pedido = pedido.ID_Pedido
        INNER JOIN cobertura ON pedidodetalhes.ID_Cobertura = cobertura.ID_Cobertura
        WHERE pedidodetalhes.ID_Pedido = '$ID_Pedido'
        ORDER BY pedidodetalhes.ID_Pedido ASC";

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

        $sqlEntrega = "
        SELECT pedido.ID_Pedido, pedido.ID_Entrega, entrega.ID_Entrega, entrega.Descricao
        FROM pedido
        INNER JOIN entrega ON pedido.ID_Entrega = entrega.ID_Entrega
        WHERE pedido.ID_Pedido = '$ID_Pedido'";

        $resultadoBolo = mysqli_query($link, $sqlBolo);
        $resultadoCobertura = mysqli_query($link, $sqlCobertura);
        $resultadoBolo1 = mysqli_query($link, $sqlBolo);
        $resultadoCobertura1 = mysqli_query($link, $sqlCobertura);
        $resultadoCliente = mysqli_query($link, $sqlCliente);
        $resultadoPgto = mysqli_query($link, $sqlPgto);
        $resultadoEntrega = mysqli_query($link, $sqlEntrega);

        while($cont = mysqli_fetch_array($resultadoCliente)) {
            
            $EmailCliente = $cont['EmailCliente'];
            $NomeCompleto = $cont['NomeCompleto'];
            $Telefone = $cont['Telefone'];
            $Endereco = $cont['Endereco'];
            $Ncasa = $cont['Ncasa'];
            $Cidade = $cont['Cidade'];

            
            }

        while($cont = mysqli_fetch_array($resultadoPgto)) {$Descricao = $cont['Descricao'];}
        while($cont = mysqli_fetch_array($resultadoEntrega)) {$Entrega = $cont['Descricao']; $ID_Entrega = $cont['ID_Entrega'];}
     	$cont3 = '';
        $cont4 = '';
        while($cont3 = mysqli_fetch_array($resultadoBolo1) and $cont4 = mysqli_fetch_array($resultadoCobertura1)) {
            if ($cont3 != '') {
                $PrecoBolo1 = $cont3['PrecoBolo'];
                $Quantidade1 = $cont3['Quantidade'];
                $PrecoBolo1 *= $Quantidade1;
                $SubTotalBolo += $PrecoBolo1;
            }
            if ($cont4 != '') {
             	$PrecoCobertura1 = $cont4['PrecoCobertura'];
                if ($PrecoCobertura1 != 0) {$SubTotalCobertura += $PrecoCobertura1;}
            }
        }
        $SubTotal = $SubTotalBolo + $SubTotalCobertura;


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
        	<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
                        <?php  echo" <h5 class='card-title'>Cliente: $NomeCompleto</h5> ";?>
                    </div>
                    <div class="card-body">
						<?php 
                            if ($ValorFrete == 0) {$ValorFrete = 0;}
                            $ValorFinal = $SubTotal + $ValorFrete;
                            echo"
                            <h5 class='card-text'>Valor do pedido: R$$SubTotal,00</h5>
                            <br>
                            
                            <h6 class='card-text'>Telefone: $Telefone</h6>
                           
                            <br>
                            
                            ";
                            if ($ID_Entrega != 2 ){
                            echo "<h5 class='card-text'>Tipo de Entrega: $Entrega</h5>
                            <h6 class='card-text'>Endereço de entrega: $Endereco , $Ncasa - $Cidade</h6>"; 
                        	}
                        	echo "<h5 class='card-text'>Valor do frete: $ValorFrete</h5><br>";
                            if ($Descricao == '') {
                            	echo "<h5 class='card-text'>Nenhum método de pagamento foi selecionado:</h5>"; 
                            }else if ($Descricao != ""){echo "<h5 class='card-text'>Pagamento em: $Descricao</h5>"; }
                            echo "
                            
                            <br>
                            <h5 class='card-text text-muted'>Observação: $ObsPedido</h5>
                            <h5 class='card-text'>Valor Final: R$$ValorFinal,00</h5>
                            <hr>
                            <h5 class='card-text'>Status do pedido: $Status</h5>
                            <a href='res_pedido_analise1.php?ID_Pedido=".$ID_Pedido."' class='btn btn-primary'><i class='fas fa-spinner'></i> Em Análise</a>
                            <a href='res_pedido_forno1.php?ID_Pedido=".$ID_Pedido."' class='btn btn-primary'><i class='fas fa-clock'></i> Preparando</a>
                            <a href='res_pedido_concluido1.php?ID_Pedido=".$ID_Pedido."' class='btn btn-primary'><i class='far fa-check-square'></i> Concluido</a>
                            <a href='res_pedido_entrega1.php?ID_Pedido=".$ID_Pedido."' class='btn btn-primary'><i class='fas fa-truck'></i> Saiu para Entrega</a>
                            
                           
                                    ";

                            
                        ?>
					</div>
				</div>
			</div>
            <div class="col-sm-12"> <!-- Listagem dos produtos cadastrados nesse pedido -->
                <div class="card">
                    <div class="card-body">
                         <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sabor Bolo</th>
                                        <th>Sabor Cobertura</th>
                                        <th>Preco Bolo</th>
                                        <th>Preco Cobertura</th>
                                        <th>Obs</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $cont1 = '';
                                    $cont2 = '';
                                    while($cont1 = mysqli_fetch_array($resultadoBolo) and $cont2 = mysqli_fetch_array($resultadoCobertura)) {
                                        if ($cont1 != '') {
                                            $ID_Bolo = $cont1['ID_Bolo'];
                                            $SaborBolo = $cont1['SaborBolo'];
                                            $PrecoBolo = $cont1['PrecoBolo'];
                                            $Quantidade = $cont1['Quantidade'];
                                            $Obs = $cont1['Obs'];
                                        }
                                        if ($cont2 != '') {
                                            $ID_Cobertura = $cont2['ID_Cobertura'];
                                            $SaborCobertura = $cont2['SaborCobertura'];
                                            $PrecoCobertura = $cont2['PrecoCobertura'];
                                        }else {
                                            $ID_Cobertura = '';
                                            $SaborCobertura = '';
                                            $PrecoCobertura = '';
                                            $Quantidade = '';
                                            $Obs = '';
                                        }

                                        if ($Quantidade == 0) {$Quantidade = '';}else {$Quantidade = $cont1['Quantidade'];}
                                        echo "
                                            <tr>
                                                <td>".$SaborBolo."</td>
                                                <td>".$SaborCobertura."</td>
                                                <td>R$".$PrecoBolo.",00</td>
                                                <td>R$".$PrecoCobertura.",00</td>
                                                <td>".$Obs."</td>
                                                <td><input type='text' class='text-quant' name='quant' value='".$Quantidade."'></td>
                                                
                                            </tr>

                                                    ";
                                        }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <?php
                            echo" <h5>SubTotal: R$$SubTotalBolo,00 + R$$SubTotalCobertura,00 = R$$SubTotal,00</h5> ";
                        ?>
                    </div>
                </div>
            </div>
        </div>
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
