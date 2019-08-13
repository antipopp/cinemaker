<?php
require_once 'utils/db.php';
$username = "";
$email    = "";
$errors = array(); 
$success = array();
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
          header('location: index.php');
        } else {
          array_push($errors, "Username o password errati");
        }
    }
}

?>