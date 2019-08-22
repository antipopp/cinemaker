<?php 
    require_once 'DbManager.php';
    require_once 'functions.php';

    function authenticate($username, $password){   
        global $cineDb;
        $username = $cineDb->sqlInjectionFilter($username);
        $password = $cineDb->sqlInjectionFilter($password);
    
        $query = "  SELECT id, username, password
                    FROM users
                    WHERE username = ?";   
  
        $result = $cineDb->performQueryWithParameters($query, "s", $username);

        $numRow = $result->num_rows;
        if ($numRow != 1)
            return false;
        
        $userRow = $result->fetch_assoc();
        
        if(password_verify($password, $userRow['password'])){
            return $userRow['id'];
        }
        else {
            return false;
        }            
    }

    function user_already_exists($username, $email){
        //Controllo se c'è già un utente registrato con quella mail e/o username	
        global $cineDb;
        $username = $cineDb->sqlInjectionFilter($username);
        $email = $cineDb->sqlInjectionFilter($email);

        $query = "  SELECT username, email
                    FROM users
                    WHERE username = ? OR email = ?";
        
        $params = array($username, $email);
        $result = $cineDb->performQueryWithParameters($query, "ss", $params);

        return $result;
    }

    function find_user($param){
        global $cineDb;
        $query = "  SELECT *
                    FROM users
                    WHERE username = '$param' 
                    OR email = '$param' 
                    OR id = '$param'";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function create_user($username, $email, $fullname, $password){
        global $cineDb;
        $username = $cineDb->sqlInjectionFilter($username);
        
        $password = $cineDb->sqlInjectionFilter($password);
        
        $query = "INSERT INTO users (`username`, `email`, `fullname`, `password`) VALUES (?, ?, ?, ?);";
        
        $params = array($username, $email, $fullname, $password);

        $result = $cineDb->performQueryWithParameters($query, 'ssss', $params);
        return $result;
    }

    function insert_screening($movie, $sala, $start) {
        global $cineDb;
        $query = "  INSERT INTO screenings (movie_id, sala_id, screening_start) 
                    VALUES('$movie', '$sala', '$start')";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function get_all_movies() {
        global $cineDb;
        $query = "  SELECT *
                    FROM movies";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function get_movie($id) {
        global $cineDb;
        $query = "  SELECT *
                    FROM movies
                    WHERE id = $id";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function get_all_rooms() {
        global $cineDb;
        $query = "  SELECT *
                    FROM sale";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function get_room($id) {
        global $cineDb;
        $query = "  SELECT *
                    FROM sale
                    WHERE id = $id";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function get_screening($id) {
        global $cineDb;
        $query = "  SELECT *
                    FROM screenings
                    WHERE id = $id";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function update_screening($id, $screening_start) {
        global $cineDb;
        $query = "  UPDATE screenings
                    SET screening_start = '$screening_start'
                    WHERE id = $id";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function delete_screening($id) {
        global $cineDb;
        $query = "  DELETE FROM screenings
                    WHERE id = $id";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function get_onair() {
        global $cineDb;
        $query = "  SELECT *
                    FROM movies 
                    WHERE onair = 1";
        $result = $cineDb->performQuery($query);
        return $result; 
    }

    function get_screenings_by_movie($movie) {
        global $cineDb;
        $query = "  SELECT *
                    FROM screenings
                    WHERE movie_id = $movie
                    AND screening_start > CURRENT_DATE()
                    ORDER BY screening_start";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function get_screenings_by_room($room) {
        global $cineDb;
        $query = "  SELECT *
                    FROM screenings
                    WHERE sala_id = $room
                    ORDER BY screening_start";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function is_admin($id) {
        global $cineDb;
        $query = "  SELECT isAdmin
                    FROM users
                    WHERE id=$id";
        $result = $cineDb->performQuery($query);
        $isAdmin = $result->fetch_assoc();
        return $isAdmin['isAdmin'];
    }

    function change_email($email, $id) {
        global $cineDb;
        $duplicate = find_user($email)->num_rows;
        if ($duplicate == 1) {
            return 0;
        }
        else {
            $query = "  UPDATE users
                        SET email='$email',
                        WHERE id=$id";
            $update = $cineDb->performQuery($query);
            return 1;
        }
    }

    function change_password($new_password, $id) {
        global $cineDb;
        $result = find_user($id)->fetch_assoc();
        $query = "  UPDATE users
                    SET password='$new_password',
                    WHERE id=$id";
        $update = $cineDb->performQuery($query);
        return $update;
    }

    function get_movie_cover($id) {
        global $cineDb;
        global $uploaddir;
        $query = "SELECT location
                    FROM upload
                    WHERE uidimg='$id'";
        $result = $cineDb->performQuery($query)->fetch_assoc();
        $location = PathToUrl(ROOT.$result['location']);
        return $location;
    }

    
?>