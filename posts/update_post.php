<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['id'];
    $content = trim($_POST['content']);

    if (!empty($content)) {
        try {
            $stmt = $pdo->prepare("UPDATE posts SET content = :content WHERE id = :id");
            $stmt->execute([
                'content' => $content,
                'id' => $post_id
            ]);

            // Redirect back to homepage after update
            header("Location: ../index.php?updated=1");
            exit;
        } catch (PDOException $e) {
            die("Error updating post: " . $e->getMessage());
        }
    } else {
        echo "Post content cannot be empty.";
    }
} else {
    echo "Invalid request.";
}
?>
