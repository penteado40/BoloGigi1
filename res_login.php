<?php  
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

require('conexaobd.php');

$result = mysqli_query($link, "SELECT * FROM admin WHERE EmailAdmin = '$email' AND Senha = '$senha'");

if(mysqli_num_rows ($result) > 0 )
{
	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $senha;
	header('location:index.php');
}
else{
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  header('location:login_senha.php');
   
  }

?>