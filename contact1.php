<?php



$errors = array();

// Check if name has been entered
if (!isset($_POST['fname'])) {
    $errors['fname'] = 'Please enter your full name';
}



// Check if phone has been entered and is valid
//if (!isset($_POST['phone']) || !filter_var($_POST['phone'], FILTER_VALIDATE_INT)) {
  //  $errors['phone'] = 'Please enter your number';
//}



// Check if email has been entered and is valid
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
}

//requrement
if (!isset($_POST['reqcomp'])) {
    $errors['reqcomp'] = 'Please enter your Requirement';
}



//Check if message has been entered
if (!isset($_POST['message'])) {
    $errors['message'] = 'Please enter your message';
}



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



$fname = $_POST['fname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$reqcomp = $_POST['reqcomp'];
$message = $_POST['message'];

$from = $email;
$to = 'vaibhavakatkar@gmail.com';  // please change this email id
$subject = 'Contact Us Details';
$phone ='9766877788'; 
$body = "From: $fname\n  E-Mail: $email\n Contact Number: $phone\n Requiremant: $reqcomp\n Details: $message\n ";

$headers = "From: " . $from;


//send the email
$result = '';
if (mail($to, $subject, $body, $headers)) {
    $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
    $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    //header('Location:http://13.201.157.211/');
    header('Location: http://13.201.157.211/ContactUs.html'); 
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
header("refresh:2; url=ContactUs.html");
// $mail->SMTPDebug = 2;
// $lastError = error_get_last();
// if (!empty($lastError)) {
//     print_r($lastError);
// }
