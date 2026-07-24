<?php
require 'login/check.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try{
    if(isset($_POST['name'])){
        updateUser($pdo, $_POST['userid'], $_POST['name'], $_POST['email']);
        header('location: users.php');
    }else{
        $user = getUser($pdo, $_GET['id']);
        $title = 'Edit user';

        ob_start();
        include '../templates/edituser.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>
