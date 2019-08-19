<?php 
	require_once 'login.php';
	require_once '../config.php';
	require_once 'utils/functions.php';
	session_start();
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
	<?php 
		include 'navbar.php'; 
		if (!isLogged()) {
	?>
	<div class="form-container">
		<div class="form-panel thin">
			<h2 class="form-header">login</h2>
			<?php include 'errors.php'; ?>
			<form action="#" method="post">
				<input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" placeholder="Password" required>
				<br>
				<button type="submit" name="login_user">INVIA</button>
			</form>
		</div>
	</div>
	<?php 
		}
		else {
			header('location: '.PathToUrl(ROOT));
		}
	?>
</body>
</html>
