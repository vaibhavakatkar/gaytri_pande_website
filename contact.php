<!-- send_email.php --> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"]; $email = $_POST["email"]; $message = $_POST["message"];
    // Email parameters
    $to = "vaibhavakatkar@gmail.com"; // Change this to your email address 
    $subject = "New Contact Form Submission"; 
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    // Send email
    if (mail($to, $subject, $body)) { 
	echo "Email sent successfully";
    } else {
        echo "Failed to send email";
    }
}
?>

