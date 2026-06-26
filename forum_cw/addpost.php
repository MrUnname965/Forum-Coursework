<?php
if(isset($_POST['post_text'])){
    try{
        include 'includes/DatabaseConnection.php';

        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);

        $sql = 'INSERT INTO post SET 
        post_text = :post_text,
        post_date = CURDATE(),
        image = :image,
        userid = :userid,
        moduleid = :moduleid';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_text', $_POST['post_text']);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':userid', $_POST['users']);
        $stmt->bindValue(':moduleid', $_POST['modules']);
        $stmt->execute();
        header('location: posts.php');
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include 'includes/DatabaseConnection.php';
    $title = 'Add a new post';
    $sql_u = 'SELECT * FROM user';
    $users = $pdo->query($sql_u);
    $sql_m = 'SELECT * FROM module';
    $modules = $pdo->query($sql_m);
    ob_start();
    include 'templates/addpost.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>