<?php
// Include the Database class
include_once 'Database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    // Create an instance of the Database class
    $database = new Database();
    $conn = $database->getConnection();

    // Create the query to insert the comment
    $sql = "INSERT INTO comments (post_id, username, comment) VALUES (?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iss", $post_id, $username, $comment);
        
        // Execute the query
        if ($stmt->execute()) {
            echo "Your comment was added successfully!";
        } else {
            echo "There was an error!";
        }

        $stmt->close();
    }

    $conn->close();
}
?>
