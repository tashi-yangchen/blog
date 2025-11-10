<?php require_once 'includes/auth_check.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once "includes/navbar.php" ?>

<div class="bg-light py-3 border-bottom shadow-sm">
    <div class="container">
        <h4 class="my-0 text-center text-dark"> Create New Post </h4>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 700px;">
        <div class="card-body">

            <form action="posts/create_new_post.php" method="POST">
                <!-- Post content textarea -->
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea name="content" id="content" rows="8" class="form-control"
                              placeholder="Write something ..." required></textarea>
                </div>

                <!-- Publish button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-paper-plane me-1"></i> Publish Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
