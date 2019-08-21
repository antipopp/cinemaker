<?php 
    require_once UTILS.'DbManager.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';

    $errors = [];
    $success = [];

    $row = find_user($_SESSION['id'])->fetch_assoc();
    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];

    if(isset($_POST['send_edit'])) {
        if (authenticate($username, $_POST['old_password']) != 0) {
            if ($email != $_POST['email']) {
                $new_email = $cineDb->sqlInjectionFilter($_POST['email']);
                $result = change_email($new_email, $id);
                if (!$result)
                    array_push($errors, "Email già utilizzata");
            }
        
            if (!empty($_POST['new_password'])) {
                $password_1 = $cineDb->sqlInjectionFilter($_POST['new_password']);
                $password_2 = $cineDb->sqlInjectionFilter($_POST['new_password_confirm']);
                if ($password_1 != $password_2)
                    array_push($errors, "Le nuove password non coincidono");
                else 
                    $result = change_password($password_1, $id);
            }
        }
        else
            array_push($errors, "La vecchia password è sbagliata");
    }
?>