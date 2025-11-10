<?php
require_once "../config/db.php";

// Check if an ID is provided
if(isset($_GET["id"])){
    $post_id = $_GET['id'];

    try {
        // Delete the post
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->execute(['id' => $post_id]);

        // Redirect to homepage with success flag
        header("Location: ../index.php?deleted=1");
        exit;
    } catch (PDOException $e) {
        die("Error deleting post: " . $e->getMessage());
    }

} else {
    echo "Invalid or missing post ID.";
}
?>
