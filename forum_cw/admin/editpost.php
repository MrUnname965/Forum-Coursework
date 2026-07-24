<?php
require 'login/check.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try{
    if(isset($_POST['post_text'])){

        // $sql = 'UPDATE post SET post_text = :post_text WHERE id = :id';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':post_text', $_POST['post_text']);
        // $stmt->bindValue(':id', $_POST['postid']);
        // $stmt->execute();

        if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);
        }else{
        $post = getPost($pdo, $_POST['postid']);
        $image = $post['image'];
        }

        updatePost($pdo, $_POST['postid'], $_POST['post_text'], $_POST['users'], $_POST['modules'], $image);
        header('location: posts.php');
    }else{
        // $sql = 'SELECT * FROM post WHERE id = :id';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':id', $_GET['id']);
        // $stmt->execute();
        $users = allUsers($pdo);
        $modules = allModules($pdo);
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