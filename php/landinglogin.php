<?php 
	include_once 'login.php';
	include_once '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<?php include('navbar.php'); ?>
	<div class="landing-container">
		<div class="login-panel">
			<h2 class="login-header">login</h3>
			<?php include('errors.php') ?>
			<form action="landinglogin.php" method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<br>
				<button type="submit" name="login_user">SUBMIT</button>
			</form>
		</div>
	</div>
</body>
</html>
