<?php
// Include the database connection file
require_once '../config/db.php';

// Check if the request method is POST (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the post content sent from the front end
    $content = $_POST['content']; //we are d2csn

    // print_r ($_POST);
    // echo "$content";
    // Make sure the content field is not empty
    if (!empty($content)) {
        try {
            // Prepare an SQL statement to insert the post content into the database
            $stmt = $pdo->prepare("INSERT INTO posts (content) VALUES (:content)");

            // Execute the prepared statement and bind the content parameter
            $stmt->execute(['content' => $content]);

            // Redirect back to the homepage with a success flag in the URL
            header("Location: ../index.php?success=1");
            exit; // Stop further script execution after redirect
        } catch (PDOException $e) {
            // If something goes wrong, display an error message
            die("Error adding post: " . $e->getMessage());
        }
    } else {
        // If the content is empty, show a message (backend validation)
        echo "Post content cannot be empty.";
    }
} else {
    // If the request didn’t come from a POST form submission
    echo "Invalid request.";
}
?>
