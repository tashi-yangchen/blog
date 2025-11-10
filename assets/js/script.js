function confirmDelete(postId){
    if(confirm("Are you sure you want to delete this post?")){
        // if the user clicks on "ok" in the confirmation box, we will get
        // redirected to delete_post.php file with the id of the post to be deleted
        window.location.href = "posts/delete_post.php?id=" + postId;
    }
}
