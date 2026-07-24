<?php
require 'login/check.php';
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deleteUser($pdo, $_POST['id']);
    header('location: users.php');
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to delete user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>
