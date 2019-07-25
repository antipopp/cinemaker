<?php 
    require_once 'utils/db.php';
    $user_query = "SELECT * FROM users WHERE id=".$_SESSION['id'];
    $user_results = mysqli_query($db, $user_query);
    $row = mysqli_fetch_assoc($user_results);
    $errors = [];
    $success = [];

    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    $old_password = $row['password'];

    if(isset($_POST['send_edit'])) {
        if ($email != $_POST['email']) {
            $new_email = mysqli_real_escape_string($db, $_POST['email']);
            $email_check_query = "SELECT * FROM users WHERE email='$new_email' LIMIT 1";
            $result = mysqli_query($db, $email_check_query);
            $email_check = mysqli_fetch_assoc($result);

            if ($email_check)
                array_push($errors, "Email già utilizzata");
        }
        else
            $new_email = $email;
        
        
        if ($_POST['new_password'] != "") {
            $password_1 = mysqli_real_escape_string($db, $_POST['new_password']);
            $password_2 = mysqli_real_escape_string($db, $_POST['new_password_confirm']);
            if ($password_1 != $password_2)
                array_push($errors, "Le nuove password non coincidono");
            else
                $password = md5($password_1);
        }
        else 
            $password = $old_password;

        if ($old_password != md5($_POST['old_password']))
            array_push($errors, "La vecchia password è sbagliata");
        
        if (count($errors) == 0) {      
            $query = "UPDATE users
                    SET password='".$password."',
                        email='".$new_email."'
                     WHERE id=".$id;
            mysqli_query($db, $query);
        }
    }
?>