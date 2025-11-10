<?php
$host = 'localhost';
$dbname = 'blog'; #name of the database you want to connect to
$username = 'blog_user'; #user from your database
$password = ''; #password for that user

try {
    // PDO - PHP Data Objects (modern, secure, and flexible way to connect to MySQL)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // ERRMODE_EXCEPTION lets you catch errors easily
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
