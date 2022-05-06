<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>

<?php 
 echo 'cualquier locura punto y coma';
if(isset($_POST['username']) and isset($_POST['password']))
{
 require_once "./controller/Login_controller.php";

	$login=new Login_controller();
	$login->verify($_POST['username'], $_POST['password']);
}

 ?>
	<h1>LOGIN</h1>

</body>
</html>
