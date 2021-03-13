<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    	require("metas.php");
		require("navbar.php");
    	require("menu.php");
        include('conexaobd.php');
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
                                <form method="POST" action="res_cadbolo.php">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sabor</label>
                                        <input type="text" class="form-control" name="sabor">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Obs:</label>
                                        <input type="text" class="form-control" name="obs">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Preço:</label>
                                        <input type="text" class="form-control" name="preco">
                                    </div>
                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                    </form>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="res_cadcobertura.php">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sabor</label>
                                        <input type="text" class="form-control" name="sabor">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Obs:</label>
                                        <input type="text" class="form-control" name="obs">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Preço:</label>
                                        <input type="text" class="form-control" name="preco">
                                    </div>
                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
        
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic Tabs</h5>
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
                                                        <th>Sabor</th>
                                                        <th>Obs</th>
                                                        <th>Preco</th>
                                                        <th>Editar</th>
                                                        <th>Excluir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                
                                                $sql = "SELECT * FROM bolos ORDER BY SaborBolo ASC";
                                                $resultado = mysqli_query($link, $sql);

                                                while ($cont = mysqli_fetch_array($resultado)) {
                                                echo "
                                                <tr>
                                                <td>".$cont['SaborBolo']."</td>
                                                <td>".$cont['Obs']."</td>
                                                <td>R$".$cont['PrecoBolo'].",00</td>
                                                <td><a href='edit_bolo.php?ID_Bolo=".$cont['ID_Bolo']."'><i class='fa fa-edit link'></i></a></td>
                                                <td> <a href='del_bolo.php?ID_Bolo=".$cont['ID_Bolo']."' data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class='fas fa-trash-alt link'></i></td>
                                                </tr>
                                                    "  ;
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="coberturas" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                     <tr>
                                                        <th>Sabor</th>
                                                        <th>Obs</th>
                                                        <th>Preco</th>
                                                        <th>Editar</th>
                                                        <th>Excluir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                
                                                    $sql = "SELECT * FROM cobertura ORDER BY SaborCobertura ASC";
                                                    $resultado = mysqli_query($link, $sql);

                                                    while ($cont = mysqli_fetch_array($resultado)) {
                                                    echo "
                                                <tr>
                                                <td>".$cont['SaborCobertura']."</td>
                                                <td>".$cont['Obs']."</td>
                                                <td>R$".$cont['PrecoCobertura'].",00</td>
                                                <td><a href='edit_cobertura.php?ID_Cobertura=".$cont['ID_Cobertura']."'><i class='fa fa-edit link'></i></a></td>
                                                <td> <a href='del_cobertura.php?ID_Cobertura=".$cont['ID_Cobertura']."' onclick='ConfirmDel()'><i class='fas fa-trash-alt link'></i></td>
                                                </tr>
                                                    "  ;
                                                }
                                                          ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
