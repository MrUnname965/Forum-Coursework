<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    // $sql = 'DELETE FROM post WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':id', $_POST['id']);
    // $stmt->execute();
    deletePost($pdo, $_POST['id']);
    header('location: posts.php');
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete post: ' .$e->getMessage();
}
include '../templates/admin_layout.html.php';
?>