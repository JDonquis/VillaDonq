
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>

	<?php 

	require_once "/var/www/html/development/WEB_PROJECT/controller/Student_controller.php";
	require_once "/var/www/html/development/WEB_PROJECT/controller/Personal_controller.php";

	ini_set('display_errors', 1);

	ini_set('display_startup_errors', 1);

	$student=new Students_controller;
	
	$array2=Students_controller::get_Students();
	$array=Personal_controller::get_Personal();

	print_r($array);

	echo "<br><br><br><br>";

	print_r($array2);



 ?>

</head>
<body>
	
</body>
</html>

