<?php
$email = $_POST['email'];
$password = $_POST['password'];



$conn = new mysqli('localhost', 'root', '', 'blog');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the customer data
    $customer = $result->fetch_assoc();
    echo "<script>
            window.location.href = 'MyPosts.html';
            localStorage.setItem('isLoggedIn', true);
            localStorage.setItem('role'," . $customer['role'] . ");
        </script>";
} else {
    echo "<script>
    alert('Invalid email or password, the user was not found. $result .');
    </script>";
}

$conn->close();
?>
