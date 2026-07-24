<?php
require 'login/check.php';
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $users = allUsers($pdo);
    $title = 'Users';
    $totalUsers = totalUsers($pdo);

    ob_start();
    include '../templates/users.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>
