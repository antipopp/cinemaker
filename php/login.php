<?php
    require_once '../config.php';
    require_once 'utils/DbManager.php';
    require_once 'utils/functions.php';
    require_once 'utils/queries.php';

    $errorCount = 0;
    $success = array();
    $errors = array();
    $err1 = "Tutti i campi sono obbligatori";
    $err2 = "Username o password errati";

    if (isset($_POST['login_user'])) {
        $username = $cineDb->sqlInjectionFilter($_POST['username']);
        $password = $cineDb->sqlInjectionFilter($_POST['password']);

        if (empty($username)) {
            $errorCount++;
            header('location: '.PathToUrl(ROOT."php/signin.php?error=".$err1));
        }
        if (empty($password)) {
            $errorCount++;
            header('location: '.PathToUrl(ROOT."php/signin.php?error=".$err1));
        }

        if ($errorCount == 0 || count($errors) == 0) {
            $result = authenticate($username, $password);
            if ($result) {         
                session_start();
                setSession($username, $result);
                header('location: '.PathToUrl(ROOT."index.php"));
            } else {
                array_push($errors, "Username o password errati");
                header('location: '.PathToUrl(ROOT."php/signin.php?error=".$err2));
            }
        }
    }
?>