<?php 
	include_once 'registration.php'; 
	include_once '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrazione</title>
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<?php include_once 'navbar.php'; ?>
	<div class="landing-container">
		<div class="login-panel">
			<h2 class="login-header">Registrazione</h3>
			<?php include_once 'errors.php';?>
			<form action="#" method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password_1" placeholder="Password">
				<input type="password" name="password_2" placeholder="Conferma password">
				<input type="email" name="email" placeholder="Email">
				<br>
				<button type="submit" name="reg_user">INVIA</button>
			</form>
		</div>
	</div>
</body>
</html>