<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password']; // Ruajtja e fjalëkalimit si tekst të thjeshtë
$phone = $_POST['phone'];

// Konektimi me databazën
$conn = new mysqli('localhost', 'root', '', 'blog');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Query për të shtuar të dhënat në tabelë
$sql = "INSERT INTO users (first_name, last_name, email, password, phone) 
        VALUES ('$first_name', '$last_name', '$email', '$password', '$phone')";

// Ekzekuto query
if ($conn->query($sql) === TRUE) {
    // Regjistrimi ishte i suksesshëm, shfaq alert dhe confirm
    echo "<script>
            alert('Sign up complete!');
            if (window.confirm('Sign up complete! Click OK to continue to MyPosts.')) {
                window.location.href = 'MyPosts.html';
            }
        </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
