<?php
// session starts here, i.e, the server starts tracking the user from this page
// all session details can now be available in $_SESSION superglobal
session_start();

require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $fullname = trim($_POST['fullname']);

    if (!empty($username) && !empty($password) && !empty($fullname)) {
        // Hash password before storing
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, password, fullname) VALUES (:username, :password, :fullname)");
            $stmt->execute(['username' => $username, 'password' => $hashed, 'fullname' => $fullname]);

            // Get the ID of the newly created user
            $user_id = $pdo->lastInsertId();

            // Store user info in session
            $_SESSION['user_id'] = $user_id;
            
            header("Location: ../index.php?success=1");
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required.";
    }
}
?>
