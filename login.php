<!DOCTYPE html>
<html lang="en">

<head>
<?php
    	require("metas.php");/*
    	require("navbar_login.php");*/
      ?>
</head>
<body>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<form method="POST" action="res_login.php">
					<div class="card-body">
						<img src="assets/images/logo-full.png" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Entrar</h4>
						<div class="form-group mb-3">
							<label class="floating-label" for="Email">Email</label>
							<input type="text" class="form-control" id="Email" placeholder="" name="email">
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="Password">Senha</label>
							<input type="password" class="form-control" id="Password" placeholder="" name="senha">
						</div>
						<button class="btn btn-block btn-primary mb-4">Entrar</button>
						</form>
						<p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
						<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<?php require("scripts.php") ?>

</body>

</html>
