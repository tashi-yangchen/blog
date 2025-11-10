<?php
require_once 'includes/auth_check.php';
// Include the database connection
require_once 'config/db.php';
require_once 'includes/header.php';
require_once "includes/navbar.php";

// Check if an ID is provided in the URL (e.g., view_post.php?id=3) a
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    try {
        // Prepare and execute a query to fetch the specific post
        $stmt = $pdo->prepare("SELECT id, content, created_at FROM posts WHERE id = :id");
        $stmt->execute(['id' => $post_id]);
        // the following line fetches a single row of post (with given id) and present it as an associate array
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching post: " . $e->getMessage());
    }
} else {
    // If no valid ID is provided, redirect to homepage
    header("Location: ../index.php");
    exit;
}
?>

<div class="bg-light py-3 border-bottom shadow-sm">
    <div class="container">
        <h4 class="my-0 text-center text-dark"> Details of Post </h4>
    </div>
</div>


<div class="container my-5">
    <?php if ($post): ?>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title text-dark">Post #<?php echo htmlspecialchars($post['id']); ?></h5>
                <p class="card-text fs-5 mt-3"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                <small class="text-muted">
                    <i class="fa-regular fa-clock"></i>
                    Posted on: <?php echo date('F j, Y, g:i a', strtotime($post['created_at'])); ?>
                </small>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <!-- this will enable the post to be edited -->
                <a href="edit_post_form.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-primary btn-sm">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>
                <!-- this delete button will trigger js confirmation logic when we click on it -->
                <button class="btn btn-outline-danger btn-sm" onclick="confirmDelete(<?php echo $post['id']; ?>)">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center mt-5">
            That post doesn’t exist.
        </div>
    <?php endif; ?>
</div>

<script src="assets/js/script.js"></script>
<?php require_once 'includes/footer.php'; ?>
