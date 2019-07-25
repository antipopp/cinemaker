<?php
require_once 'utils/db.php';
session_start();

$username = "";
$email    = "";
$errors = array(); 
$success = array(); 

// REGISTRA UTENTE
if (isset($_POST['reg_user'])) {
  // input dal form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // validazione del form aggiungendo all'array $errors gli eventuali errori
  if (empty($username)) { array_push($errors, "Username obbligatorio"); }
  if (empty($email)) { array_push($errors, "Email obbligatoria"); }
  if (empty($password_1)) { array_push($errors, "Password obbligatoria"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Le password non coincidono");
  }

  // controllo il database per eventuali username o email gia` esistenti
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // se l'utente esiste gia`
    if ($user['username'] === $username) {
      array_push($errors, "Username gia` utilizzato");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email gia` utilizzata");
    }
  }

  // Finalizzazione della registrazione se non ci sono errori
  if (count($errors) == 0) {
    // oscuramento della password
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password) 
  	          VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$success = "Hai effetuato l'accesso";
  	header('location: ../index.php');
  }
}

// LOGIN UTENTE
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username obbligatorio");
    }
    if (empty($password)) {
        array_push($errors, "Password obbligatoria");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $row['id'];
          $_SESSION['isAdmin'] = $row['isAdmin'];
          $success = "Hai effettuato l'accesso";
          header('location: ../index.php');
        }else {
            array_push($errors, "Username o password errati");
        }
    }
  }
  
?>