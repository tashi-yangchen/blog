<?php
require_once 'includes/auth_check.php';
require_once 'config/db.php';
require_once 'includes/header.php';

// Make sure an ID was passed in the URL
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Fetch the post to edit
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->execute(['id' => $post_id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        die("Post not found.");
    }
} else {
    die("Invalid request.");
}
?>


    <div class="bg-light py-3 border-bottom shadow-sm">
        <div class="container">
            <h4 class="my-0 text-center text-dark"> Edit Post </h4>
        </div>
    </div>
<div class="container my-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 700px;">
        <div class="card-body">

            <form action="posts/update_post.php" method="POST">
                <!-- Hidden input for post ID -->
                <input type="hidden" name="id" value="<?php echo $post['id'] ?>">

                <!-- Post content textarea -->
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea name="content" id="content" rows="6" class="form-control" required><?php echo $post['content'] ?></textarea>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Update Post
                    </button>
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fa-solid fa-ban me-1"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require_once 'includes/header.php'; ?>
