<?php
include 'includes/DatabaseConnection.php';
try{
    if(isset($_POST['post_text'])){

        $sql = 'UPDATE post SET post_text = :post_text WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_text', $_POST['post_text']);
        $stmt->bindValue(':id', $_POST['postid']);
        $stmt->execute();
        header('location: posts.php');
    }else{
        $sql = 'SELECT * FROM post WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $post = $stmt->fetch();
        $title = 'Edit post';

        ob_start();
        include 'templates/editpost.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing post: ' . $e->getMessage();
}
include 'templates/layout.html.php';

?>