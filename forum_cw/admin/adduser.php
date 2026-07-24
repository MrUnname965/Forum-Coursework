<?php
require 'login/check.php';
if(isset($_POST['name'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        insertUser($pdo, $_POST['name'], $_POST['email']);
        header('location: users.php');
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
    $title = 'Add a new user';

    ob_start();
    include '../templates/adduser.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php';
?>
