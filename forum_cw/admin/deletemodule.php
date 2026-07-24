<?php
require 'login/check.php';
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deleteModule($pdo, $_POST['id']);
    header('location: modules.php');
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to delete module: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>
