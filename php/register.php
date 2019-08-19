<?php 
	require_once 'registration.php'; 
	require_once '../config.php';
	require_once 'utils/functions.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrazione</title>
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>
	<?php 
		include 'navbar.php'; 
		if (!isLogged()) {
	?>
	<div class="landing-container">
		<div class="form-panel thin">
			<h2 class="form-header">Registrazione</h2>
			<h6>Tutti i campi sono obbligatori</h5>
			<?php include_once 'errors.php';?>
			<form action="#" method="post">
				<input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password_1" placeholder="Password" required>
				<input type="password" name="password_2" placeholder="Conferma password" required>
				<input type="email" name="email" placeholder="Email" required>
				<input type="text" name="name" placeholder="Nome completo" required>
				<br>
				<button type="submit" name="reg_user">INVIA</button>
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