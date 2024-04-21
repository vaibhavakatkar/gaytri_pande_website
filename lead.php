<?php

$errors = array();

// Check if name has been entered
if (!isset($_POST['name'])) {
    $errors['name'] = 'Please enter your full name';
}



// Check if phone has been entered and is valid
// if (!isset($_POST['phone']) || !filter_var($_POST['phone'], FILTER_VALIDATE_INT)) {
//     $errors['phone'] = 'Please enter your number';
// }



// Check if email has been entered and is valid
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
}





//Check if message has been entered
// if (!isset($_POST['message'])) {
//     $errors['message'] = 'Please enter your message';
// }



$errorOutput = '';

if (!empty($errors)) {

    $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
    $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

    $errorOutput  .= '<ul>';

    foreach ($errors as $key => $value) {
        $errorOutput .= '<li>' . $value . '</li>';
    }

    $errorOutput .= '</ul>';
    $errorOutput .= '</div>';

    echo $errorOutput;
    die();
}



$name = $_POST['name'];
// $phone = $_POST['phone'];
$email = $_POST['email'];
// $message = $_POST['message'];

$from = $email;
$to = 'Keshavdpatil3@gmail.com';  // please change this email id
$subject = 'Lead Details';

$body = "From: $name\n  E-Mail: $email\n    ";

$headers = "From: " . $from;


//send the email
$result = '';
if (mail($to, $subject, $body, $headers)) {
    $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
    $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    header('Location:https://gayatripanda.com//index.html');
    $result .= '</div>';

    echo $result;
    die();
}



$result = '';
$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
$result .= 'Something bad happend during sending this message. Please try again later';
$result .= '</div>';

echo $result;
header("refresh:2; url=index.html");
// $mail->SMTPDebug = 2;
// $lastError = error_get_last();
// if (!empty($lastError)) {
//     print_r($lastError);
// }