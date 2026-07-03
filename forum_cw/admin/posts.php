<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    // $sql = 'SELECT post.id, post_text, user.name, email, module.name AS module, post_date, image FROM post
    // INNER JOIN user ON userid = user.id
    // INNER JOIN module ON moduleid = module.id';

    $posts = allPosts($pdo);
    $title = 'Posts';
    $totalPosts = totalPosts($pdo);

    ob_start();
    $imagePath = '../';
    include '../templates/posts.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';