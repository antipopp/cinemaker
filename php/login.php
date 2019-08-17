<?php
require_once '../config.php';
require_once 'utils/db.php';
require_once 'utils/functions.php';
$errors = 0;
$err1 = "Tutti i campi sono obbligatori";
$err2 = "Username o password errati";
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        $errors++;
        header('location: '.PathToUrl(ROOT."php/signin.php?error=".$err1));
    }
    if (empty($password)) {

        $errors++;
        header('location: '.PathToUrl(ROOT."php/signin.php?error=".$err1));
    }
  
    if ($errors == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $row['id'];
          $_SESSION['isAdmin'] = $row['isAdmin'];
          header('location: '.PathToUrl(ROOT."index.php"));
        } else {
          array_push($errors, "Username o password errati");
          header('location: '.PathToUrl(ROOT."php/signin.php?error=".$err2));
        }
    }
}

?>