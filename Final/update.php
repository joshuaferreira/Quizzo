<?php
// Database connection
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'quizzo';

// Create connection
$connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch quiz ID from request
$quizID = $_GET['quizCAT'];
$username = $_GET['username'];
$score = $_GET['score'];
$score = (int) $score;

// Query to update
$sql = "UPDATE scores SET $quizID = $quizID + $score WHERE username = '$username' ";

if ($connection->query($sql) === TRUE) {
    echo "
        
    ";
} else {
    echo "Error updating score: " . $connection->error;
}

$connection->close();
?>
