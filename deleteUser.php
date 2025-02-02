<?php

include('Database.php');
$database = new Database();
$conn = $database->conn;


$data = json_decode(file_get_contents('php://input'), true);
$userId = $data['userId'];

if (!empty($userId)) {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    
    if ($stmt->execute()) {
      
        echo json_encode(['success' => true]);
    } else {
     
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

$stmt->close();
$conn->close();
?>
