<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try{
    if(isset($_POST['post_text'])){

        // $sql = 'UPDATE post SET post_text = :post_text WHERE id = :id';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':post_text', $_POST['post_text']);
        // $stmt->bindValue(':id', $_POST['postid']);
        // $stmt->execute();
        updatePost($pdo, $_POST['postid'], $_POST['post_text']);
        header('location: posts.php');
    }else{
        // $sql = 'SELECT * FROM post WHERE id = :id';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':id', $_GET['id']);
        // $stmt->execute();
        $post = getPost($pdo, $_GET['id']);
        $title = 'Edit post';

        ob_start();
        include '../templates/editpost.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing post: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';

?>