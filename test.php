<?php 
    require_once 'php/utils/DbManager.php';
    require_once 'php/utils/functions.php';
    require_once 'php/utils/queries.php';
    
    session_start();
    $username = "admin";
    $email = "admin@email.it";
    $password = "admin";

    $arr = ['1A', '2B', '3b'];
    $result = implode(', ', $arr);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>
    var json = {
"rows": 15,
"cols": 18,
"blocked": [
"14D",
"9F",
"15K",
"1A",
"8D",
"6F"
]
}

    console.log(json.rows);

    </script>
</body>
</html>