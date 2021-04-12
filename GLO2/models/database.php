<?php 
    $dsn = 'mysql:host=localhost;dbname=bub_glo2';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $error) {
        $error_message = $error->getMessage();
        include('../errors/databse_error.php');
        exit();
    }
?>