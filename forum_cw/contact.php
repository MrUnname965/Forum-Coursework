<?php
if (isset($_POST['message'])) {
    $title = 'thank you';
    $email = $_POST['email'];
    $message = $_POST['message'];
    $headers = 'From: ' . $email;

    mail('pn1850a@gre.ac.uk', 'New message from FCW', $message, $headers);
    $output = 'Thank you for your message, we will get back to you shortly';
} else {
    $title = 'contact admin';
    ob_start();
    include 'templates/mailform.html';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>