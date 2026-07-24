<?php
require 'login/check.php';
if(isset($_POST['name'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        insertModule($pdo, $_POST['name']);
        header('location: modules.php');
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
    $title = 'Add a new module';

    ob_start();
    include '../templates/addmodule.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php';
?>
