<?php
require_once 'config/db.php';
require_once 'includes/header.php';

// always keep this line on the top of the file
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login_form.php");
    exit;
}

// Include database connection
// You need to include the following line in all the pages that require working with database
    try {
        // Fetch all posts from the database, ordered by newest first
        $stmt = $pdo->query("SELECT id, content, created_at FROM posts ORDER BY created_at DESC");
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching posts: " . $e->getMessage());
    }
?>


<div class="bg-light py-3 mb-3 border-bottom shadow-sm">
    <div class="container">
        <h4 class="my-0 text-center text-dark"> All Posts  </h4>
    </div>
</div>

<?php if (count($posts) > 0): ?>
    <!-- Loop through and display all posts -->
    <div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <!-- this line below creates a link to view each post individually -->
                    <a href="view_post.php?id=<?php echo $post['id']; ?>" class="text-decoration-none text-dark">
                        <h5 class="card-title">Post #<?php echo ($post['id']); ?></h5>
                        <p class="card-text"><?php echo substr($post['content'], 0, 10); ?>...</p>
                    </a>
                    <small class="text-muted">
                        <i class="fa-regular fa-clock"></i>
                        Posted on: <?php echo date('F j, Y, g:i a', strtotime($post['created_at'])); ?>
                    </small>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php else: ?>
    <p>No posts found. Be the first to write one!</p>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
