<?php

include_once "db_connect.php"; 

class AddLogs{
    private $con;
    private $response;

    public function __construct($db) {
        $this->con = $db;
    }

    public function getPostUser() {
        // Assign POST data to class properties for User form
        $this->user_no = $_POST['user_no'] ?? null;
        $this->title = $_POST['title'] ?? null;
        $this->firstname = $_POST['firstname'] ?? null;
        $this->middlename = $_POST['middlename'] ?? null;
        $this->lastname = $_POST['lastname'] ?? null;
    }
    public function getPostGuest() {
        // Assign POST data to class properties for User form
        $this->firstname = $_POST['firstname'] ?? '';
        $this->middlename = $_POST['middlename'] ?? '';
        $this->lastname = $_POST['lastname'] ?? '';
        $this->g_purpose = $_POST['g_purpose'] ?? null;
    }
    

    public function user_submit() {

        $this->getPostUser();   
        if (!empty($_POST)) {
            $checkStmt = $this->con->prepare("SELECT COUNT(*) FROM user WHERE user_no = ?");
            $checkStmt->execute([$this->user_no]);
            $userExists = $checkStmt->fetchColumn();
            
            if ($userExists == 0) {

                $stmt = $this->con->prepare("
                    INSERT INTO user (user_no, title, firstname, middlename, lastname)
                    VALUES (?, ?, ?, ?, ?)
                ");
                $stmt->execute([
                    $this->user_no,
                    $this->title,
                    $this->firstname,
                    $this->middlename,
                    $this->lastname
                ]);
                header('location:../index.php');
                $this->responseSQL($stmt);
            } else {
                echo "User with this user no. already exists.";
            }
        }
    }

    public function getUserByNo($user_no) {
        $query = 'SELECT * FROM user WHERE user_no = :user_no';
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':user_no', $user_no);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function g_submit() {
        $this->getPostGuest(); // Retrieve data from POST
        
        $sql = "INSERT INTO guest (firstname, middlename, lastname, g_purpose) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
    
        if ($stmt->execute([
            $this->firstname,
            $this->middlename,
            $this->lastname,
            $this->g_purpose,
        ])) {
            $guest_id = $this->con->lastInsertId();
            // Log the guest submission with guest_id
            if ($this->log_submit(null, $guest_id, $this->g_purpose)) {
                return $guest_id;
            } else {
                return false;
            }
        } else {
            error_log("Failed to insert guest: " . implode(", ", $stmt->errorInfo()));
            return false;
        }
    }
    
    public function log_submit($user_id = null, $guest_id = null, $purpose) {
        try {
            $query = "INSERT INTO log (user_id, guest_id, purpose, date) VALUES (:user_id, :guest_id, :purpose, CURRENT_TIMESTAMP)";
            $stmt = $this->con->prepare($query);
            
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':guest_id', $guest_id); // Ensure this is not NULL if a guest exists
            $stmt->bindParam(':purpose', $purpose);
            
            if (!$stmt->execute()) {
                error_log("Failed to log: " . implode(", ", $stmt->errorInfo()));
                return false;
            }
            return true;
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }
    
    
    public function handleLogSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['log_submit'])) {
            $user_id = $_POST['user_id'] ?? null;
            $purpose = $_POST['purpose'];
    
            if ($user_id) {
                if ($this->log_submit($user_id, null, $purpose)) {
                    header('Location: ./index.php');
                    exit;
                }
            }
        }
    }
    
    public function handleGuestSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['g_submit'])) {
            $guest_id = $this->g_submit();
            if ($guest_id) {
                header('Location: ./index.php');
                exit;
            }
        }
    }
    
    

    

// Function to get all logs with optional filtering by user_id or guest_id
public function getAllLogs($user_id = null, $guest_id = null) {
    // Base SQL query
    $sql = "
        SELECT 
            log.log_id, 
            user.user_no, 
            COALESCE(guest.title, user.title) AS log_title, 
            COALESCE(guest.g_purpose, log.purpose) AS log_purpose,
            COALESCE(guest.firstname, user.firstname) AS log_firstname,
            COALESCE(guest.middlename, user.middlename) AS log_middlename,
            COALESCE(guest.lastname, user.lastname) AS log_lastname,
            log.date
        FROM log
        LEFT JOIN user ON log.user_id = user.user_id
        LEFT JOIN guest ON log.guest_id = guest.guest_id
    ";

    // Add WHERE conditions if filtering by user_id or guest_id
    $conditions = [];
    $params = [];

    if (!is_null($user_id)) {
        $conditions[] = "log.user_id = :user_id";
        $params[':user_id'] = $user_id;
    }
    if (!is_null($guest_id)) {
        $conditions[] = "log.guest_id = :guest_id";
        $params[':guest_id'] = $guest_id;
    }

    // Append conditions to the query if any exist
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
        
    }

    $sql .= " ORDER BY log.date DESC";
    // Prepare and execute the query
    $stmt = $this->con->prepare($sql);
    $stmt->execute($params);

    // Fetch and return the result
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




    

    
    public function getAllUser() {
        $stmt = $this->con->prepare("SELECT * FROM user WHERE user_id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllGuest() {
        $stmt = $this->con->prepare("SELECT * FROM guest WHERE guest_id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Function to handle SQL response
    private function responseSQL($stmt) {
        $this->response = $stmt->rowCount() ? 'success' : 'failed';
    }

    // Get SQL response
    public function getResponse() {
        return $this->response;
    }
}


$addLogs = new AddLogs(@$db);

?>