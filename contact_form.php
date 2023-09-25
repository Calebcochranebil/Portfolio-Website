<?php
    $to_email = "calebcochranebil33@gmail.com"; // Change to your desired email address
    $subject = "Contact Form Submission";
    $message = $_POST['message'];
    $headers = "From: " . $_POST['email'] . "\r\n" .
            "Reply-To: " . $_POST['email'] . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

    // Send the email
    mail($to_email, $subject, $message, $headers);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $to_email = "calebcochranebil33@gmail.com"; // Change to your desired email address

        // Sanitize input
        $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        // Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $subject = "Contact Form Submission from $fullname";
            $headers = "From: $email\r\n" .
                    "Reply-To: $email\r\n" .
                    "X-Mailer: PHP/" . phpversion();

            // Send the email and handle errors
            if (mail($to_email, $subject, $message, $headers)) {
                echo "Thank you for your message. We will be in touch soon.";
            } else {
                echo "Sorry, there was an error sending your message.";
            }
        } else {
            echo "Invalid email address. Please provide a valid email.";
        }
    } else {
        echo "Invalid request.";
    }
?>

<!-- You can redirect the user to a thank-you page or display a thank-you message here -->
