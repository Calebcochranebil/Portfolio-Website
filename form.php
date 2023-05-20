<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    
    $to = "calebcochranebil33@gmail.com";
    $subject = "Form Submission";
    $message = "Name: $name\nEmail: $email\nCompany: $company";
    $headers = "From: $email";
    
    mail($to, $subject, $message, $headers);
}

?>
