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
        $buscaPedido = "SELECT pedido.ID_Pedido, pedido.EmailCliente, pedido.ValorFinal, pedido.ObsPedido, pedido.Status, cliente.Emailcliente, cliente.NomeCompleto, cliente.Telefone FROM pedido INNER JOIN cliente ON pedido.EmailCliente = cliente.EmailCliente ORDER BY ID_Pedido DESC";
        $resultado1 = mysqli_query($link, $buscaPedido);

/*
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
        ORDER BY pedidodetalhes.ID_Pedido ASC";

        $sqlPgto = "
        SELECT pedido.ID_Pedido, pedido.ID_Pagamento, pagamento.ID_Pagamento, pagamento.Descricao
        FROM pedido
        INNER JOIN pagamento ON pedido.ID_Pagamento = pagamento.ID_Pagamento"
       ;


        $resultadoBolo = mysqli_query($link, $sqlBolo);
        $resultadoCobertura = mysqli_query($link, $sqlCobertura);
        $resultadoBolo1 = mysqli_query($link, $sqlBolo);
        $resultadoCobertura1 = mysqli_query($link, $sqlCobertura);
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
     
	*/
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
            <!-- [ form-element ] start -->
            
            <!-- [ form-element ] end -->
        
        <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Pedidos</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped" >
                                <thead align="center">
                                    <tr>
                                    	<th>ID Pedido</th>
                                        <th>Nome do cliente</th>
                                        <th>Telefone</th>
                                        <th>Info</th>
                                        <th>Status</th>
                                        <th>Analisando</th>
                                        <th>Fazendo</th>
                                        <th>Concluído</th>
                                        <th>Entrega</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <?php 
                                       	while($cont1 = mysqli_fetch_array($resultado1)) {
        									$ID_Pedido = $cont1['ID_Pedido'];
        									$EmailCliente = $cont1['EmailCliente'];
        									$NomeCompleto = $cont1['NomeCompleto'];
        									$Telefone = $cont1['Telefone'];
        									if ($cont1['ValorFinal'] == '') {
        										$ValorFinal = '';
        									}else($ValorFinal = $cont1['ValorFinal']);
        									$ObsPedido = $cont1['ObsPedido'];
        									$StatusPedido = $cont1['Status'];
        								if ($StatusPedido != '') {
        									echo "
                                                <tr>
                                                <td>".$ID_Pedido."</td>
                                                <td>".$NomeCompleto."</td>
                                                <td>".$Telefone."</td>
                                                <td><a href='info_pedido.php?ID_Pedido=".$ID_Pedido."'><i class='fas fa-info-circle'></i></a></td>
                                                <td>".$StatusPedido."</td>
                                                <td><a href='res_pedido_analise.php?ID_Pedido=".$ID_Pedido."'><i class='fas fa-spinner'></i></td>
                                                <td><a href='res_pedido_forno.php?ID_Pedido=".$ID_Pedido."'><i class='fas fa-clock'></i></td>
                                                <td><a href='res_pedido_concluido.php?ID_Pedido=".$ID_Pedido."'><i class='far fa-check-square'></i></td>
                                                <td><a href='res_pedido_entrega.php?ID_Pedido=".$ID_Pedido."'><i class='fas fa-truck'></i></td>
                                                </tr>
                                                    "  ;
        								}
                                            
                                            }    
                                            ?>
                                </tbody>
                            </table>
                        </div>
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
<?php require("scripts.php") ?>
</body>

</html>
