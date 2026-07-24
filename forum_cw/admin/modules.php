<?php
require 'login/check.php';
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $modules = allModules($pdo);
    $title = 'Modules';
    $totalModules = totalModules($pdo);

    ob_start();
    include '../templates/modules.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>
