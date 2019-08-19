<?php 
    require_once 'DbManager.php';

    function authenticate($username, $password){   
        global $cineDb;
        $username = $cineDb->sqlInjectionFilter($username);
        $password = $cineDb->sqlInjectionFilter($password);
    
        $query = "  SELECT id, username, password
                    FROM users
                    WHERE username = ?";   
  
        $result = $cineDb->performQueryWithParameters($query, "s", $username);

        $numRow = $result->num_rows();
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
                    WHERE (username OR email OR id) = $param";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function create_user($username, $email, $fullname, $password){
        global $cineDb;
        $username = $cineDb->sqlInjectionFilter($username);
        
        $password = $cineDb->sqlInjectionFilter($password);
        
        $query = "INSERT INTO users (`username`, `email`, `fullname`, `password`) VALUES (?, ?, ?, ?);";
        
        $params = array($username, $email, $fullname, $password);

        $result = $cineDb->performQueryWithParameters($query, "sssss", $params);
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
        $query = "  SELECT id, title
                    FROM movies";
        $result = $cineDb->performQuery($query);
        return $result;
    }

    function is_admin($id) {
        global $cineDb;
        $query = "  SELECT isAdmin
                    FROM users
                    WHERE id=$id";
        $result = $cineDb->performQuery($query);
        return $result;
    }
    
?>