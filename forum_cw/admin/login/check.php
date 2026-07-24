<?php
session_start();
if ($_SESSION["Authorised"] != "Y") {
    header("Location: login/noauthorised.php");
    exit();
}
?>