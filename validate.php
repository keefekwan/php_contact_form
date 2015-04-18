<?php
// Start the session
session_start();

$error = null;

// Form validations
if (isset($_POST["submit"])) {

    if (isset($_POST['name']) && $_POST['name'] == "") {
        $error = "<br />Please enter your name";
    }

    if (isset($_POST['email']) && $_POST['email'] == "") {
        $error .= "<br />Please enter your email address";
    }

    if (isset($_POST['comment']) && $_POST['comment'] == "") {
        $error .= "<br />Please enter a comment";
    }

    if (!empty($_POST['email']) AND !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
        $error .= "<br />Please enter a valid email address";
    }

    // If there are errors store it in a variable $result and display errors
    // If not send the email
    if ($error) {
        $result = '<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>'.$error.'</div>';
    } else {
        if (mail("example@example.copm", "Comment from website!", "Name: ". $_POST['name']." Email: ".$_POST['email']." Comment: ".$_POST['comment'])) {
            $result = '<div class="alert alert-success"><strong>Thank you!</strong> I\'ll be in touch.</div>';
        } else {
            $result = '<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
        }

    }

    // Store the error in the session before redirect
    if (isset($result) && !empty($result)) {
        $_SESSION['error'] = $result;

        header('Location:contact_form.php');
        exit;
    }


}
