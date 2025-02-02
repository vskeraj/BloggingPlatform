<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merr të dhënat nga forma
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $question = htmlspecialchars($_POST['question']);

    // Defino email-in dhe titullin
    $to = "musajaltina@gmail.com";  // Email-i që do të marrë mesazhin
    $subject = "New Message from Blogging Platform";
    
    // Ndërto mesazhin HTML
    $message = "
    <html>
    <head>
    <title>New Message from Contact Form</title>
    </head>
    <body>
    <p>You have received a new message from blogging platform.</p>
    <table>
    <tr>
    <th>Name:</th><td>$name</td>
    </tr>
    <tr>
    <th>Email:</th><td>$email</td>
    </tr>
    <tr>
    <th>Question:</th><td>$question</td>
    </tr>
    </table>
    </body>
    </html>
    ";

    // Krijo headers për HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    
    // Dërgo emailin
    if (mail($to, $subject, $message, $headers)) {
        echo "<p>The email was sent successfully!</p>";
    } else {
        echo "<p>An error occurred while sending the email.!</p>";
    }
    if (mail($to, $subject, $message, $headers)) {
      echo '<form action="Homepage.html" method="get">
                <button type="submit">Back to Homepage</button>
              </form>';
    } else {
        echo '<form action="Homepage.html" method="get">
                <button type="submit">Back to Homepage</button>
              </form>';
    }
    
}
?>
