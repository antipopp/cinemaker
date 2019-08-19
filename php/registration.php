<?php 
    require_once 'utils/DbManager.php';
    require_once 'utils/functions.php';
    require_once 'utils/queries.php';


    $errors = array(); 
    $success = array();
    if(isset($_POST['reg-user'])){
        $username = $cineDb->sqlInjectionFilter($_POST['username']);
        $email = $cineDb->sqlInjectionFilter($_POST['email']);
        $password_1 = $cineDb->sqlInjectionFilter($_POST['password_1']);
        $password_2 = $cineDb->sqlInjectionFilter($_POST['password_2']);
        $fullname = $cineDb->sqlInjectionFilter($_POST['name']);

        // validazione del form aggiungendo all'array $errors gli eventuali errori
        if (empty($username)) { array_push($errors, "Username obbligatorio"); }
        if (empty($email)) { array_push($errors, "Email obbligatoria"); }
        if (empty($password_1)) { array_push($errors, "Password obbligatoria"); }
        if (empty($fullname)) { array_push($errors, "Nome completo obbligatorio"); }
        if ($password_1 != $password_2) {
            array_push($errors, "Le password non coincidono");
        }

        // controllo il database per eventuali username o email gia` esistenti
        $user = user_already_exists($username, $email)->fetch_assoc();
        
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
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $result = create_user($username, $email, $fullname, $hash);
            if($result) {
                session_start();
                $userid = find_user($username);
                setSession($username, $userid['id']);
                header('location: ../index.php');
            }
            else 
                array_push($errors, "Username gia` utilizzato");
        }
    }
?>