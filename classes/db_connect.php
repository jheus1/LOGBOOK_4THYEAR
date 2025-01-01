<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'logbook_s';
    private $username = 'root'; 
    private $password = 'root'; 
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>


<!-- -- Database creation
CREATE DATABASE form_submissions;

-- Switch to the database
USE form_submissions;

-- Faculty Table
CREATE TABLE faculty (
    faculty_id INT AUTO_INCREMENT PRIMARY KEY,
    faculty_no VARCHAR(50) NOT NULL UNIQUE,
    f_date DATE NOT NULL,
    f_time TIME NOT NULL,
    f_purpose ENUM('Consultation', 'Others') NOT NULL,
    f_firstname VARCHAR(100) NOT NULL,
    f_middlename VARCHAR(100),
    f_lastname VARCHAR(100) NOT NULL
);

-- Student Table
CREATE TABLE student (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_no VARCHAR(50) NOT NULL UNIQUE,
    s_date DATE NOT NULL,
    s_time TIME NOT NULL,
    s_purpose ENUM('Consultation', 'Others') NOT NULL,
    s_firstname VARCHAR(100) NOT NULL,
    s_middlename VARCHAR(100),
    s_lastname VARCHAR(100) NOT NULL
);
 -->