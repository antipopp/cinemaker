<?php 
	require_once 'login.php';
	require_once('../config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="../css/form.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div class="form-container">
		<div class="form-panel">
			<h2 class="form-header">login</h2>
			<?php include 'errors.php'; ?>
			<form action="#" method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<br>
				<button type="submit" name="login_user">INVIA</button>
			</form>
		</div>
	</div>
</body>
</html>
