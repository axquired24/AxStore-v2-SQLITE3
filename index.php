<!DOCTYPE html>
<?php include("connect.php");
		if(isset($_SESSION['CustomerID'])){
			session_start();
		}
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AxStore</title>
	<link rel="stylesheet" href="../bs3_dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bs3_dist/css/bootstrap-theme.min.css">
	<style>
		body{
			/*background-image: url(bg.jpg);
			background-attachment: scroll;*/
			margin-top: 60px;					
		}
		.footer {
			margin-bottom: 20px;
			padding-top: 20px;
		}
	</style>
</head>
<body>
	<?php include("navbar.php"); ?>
	
	<?php
		$page=$_GET[page];
		if(!empty($page)){
			include($page.".php");
		}
		else{
			include("inc_utama.php");
		}
	?>	
	
	<?php include("footer.php"); ?>
</body>
</html>