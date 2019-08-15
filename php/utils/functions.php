<?php
    function PathToUrl($path)
    {
        $force_fwd_slash = str_replace("\\", "/", $path);
        $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $force_fwd_slash);
        return $path;
    }
?>