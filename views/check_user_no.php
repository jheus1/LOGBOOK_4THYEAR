<?php 
include '../classes/db_connect.php';

// Get the user_no from the query parameter
$user_no = isset($_GET['user_no']) ? $_GET['user_no'] : null;

if ($user_no) {
    // Prepare the SQL query to check if user_no exists
    $query = "SELECT * FROM `user` WHERE user_no = ?";
    $stmt = $conn->prepare($query);
    
    // Bind the user_no parameter
    $stmt->bind_param("s", $user_no);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user_no exists
    if ($result->num_rows > 0) {
        // If the user_no exists, it's not unique
        echo json_encode(['exists' => true]);
    } else {
        // If it doesn't exist, it's unique
        echo json_encode(['exists' => false]);
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid user_no']);
}
