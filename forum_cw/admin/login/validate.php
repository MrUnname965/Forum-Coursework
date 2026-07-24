<?php

$HashedPassword = '$2y$10$IxuCagu/XfAqF1ihwYHs6.zVxgov4/9rkBjfzX1qoQaaUKT4z1we.';

if (password_verify($_POST["password"], $HashedPassword)) { 
    session_start (); 
    $_SESSION["Authorised"] = "Y"; 
    header("Location: ../posts.php");
    exit();
} else { 
    header ("Location:wrongpassword.php");
    exit();
}
