<?php

    function PathToUrl($path)
    {
        $force_fwd_slash = str_replace("\\", "/", $path);
        $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $force_fwd_slash);
        return $path;
    }

    function isLogged()
    {		
		if(isset($_SESSION['id']))
			return $_SESSION['id'];
		else
			return false;
    }
    
    function isAdmin()
    {
        if(isset($_SESSION['isAdmin']))
			return true;
		else
			return false;
    }
?>