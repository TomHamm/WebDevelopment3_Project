<?php
    $dsn = 'mysql:host=localhost:3306;dbname=cars';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        print_r($error_message);
        exit();
    }
?>