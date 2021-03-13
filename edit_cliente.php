<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    	require("metas.php");
		require("navbar.php");
    	require("menu.php");
        include('conexaobd.php');


        $EmailCliente = $_GET['EmailCliente'];
        $sql = "SELECT * FROM cliente WHERE EmailCliente = '$EmailCliente'";

        $resultado = mysqli_query($link, $sql);
        while ($cont = mysqli_fetch_array($resultado)) {

            $EmailCliente = $cont['EmailCliente'];
            $NomeCompleto = $cont['NomeCompleto'];
            $Telefone = $cont['Telefone'];
            $Endereco = $cont['Endereco'];
            $Ncasa = $cont['Ncasa'];
            $Cidade = $cont['Cidade'];
            
        }
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic Component</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" action="res_editcliente.php">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="email" value="<?php echo $EmailCliente ?>" readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" class="form-control" placeholder="" name="nome" value="<?php echo $NomeCompleto ?>">
                                    </div>
                                    <?php echo "<a href='list_cliente.php' data-confirmBack='Tem certeza de que deseja voltar sem savar?' class='btn  btn-primary'>Voltar</a>
                                    "?>
                                    <button type="submit" class="btn  btn-primary">Salvar</button>
                            </div>
                            <div class="col-md-6">
                                   
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" placeholder="" name="telefone" value="<?php echo $Telefone ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" placeholder="" name="endereco" value="<?php echo $Endereco ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nº Casa</label>
                                        <input type="text" class="form-control" placeholder="" name="ncasa" value="<?php echo $Ncasa ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" placeholder="" name="cidade" value="<?php echo $Cidade ?>">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
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
