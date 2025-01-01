<?php
include '../classes/pdo.php';
session_start();

$message = []; // Initialize message array

if(isset($_POST['submit'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

  
            // Check in the admins table
            $stmt = $db->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
            $stmt->execute([$email, $password]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() > 0){
                $_SESSION['admin_id'] = $admin['admin_id'];
                header('location:../views/admin.php'); // Redirect to admin home page
                exit;
            } else {
                $message[] = 'Incorrect username or password!';
            }
        }
 

// Check if there are any messages to display
if (!empty($message)) {
    // Output the JavaScript code to display the error message
    echo '<script>Swal.fire({
                icon: "error",
                title: "Login Failed",
                text: "' . $message[0] . '"
            });</script>';
}
?>
