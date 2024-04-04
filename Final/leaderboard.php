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

// Query to retrieve the high scorer for the specified category
$sql = "SELECT username, $quizID AS score FROM scores ORDER BY $quizID DESC ";
$result = mysqli_query($connection, $sql);

// Check if query executed successfully
if ($result) {
    $rows = array();
    // Fetch the data
    while ($row = mysqli_fetch_assoc($result)) {
        // Access the data in the current row
        $rows[] = $row;
    }

    echo json_encode($rows);

    /*
    $highScorerUsername = $row['username'];
    $highScore = $row['score'];

    // Return the high scorer's username and score
    echo json_encode(array("username" => $highScorerUsername, "score" => $highScore));
    */
} else {
    // Handle error
    echo json_encode(array("error" => "Failed to retrieve high scorer."));
}

// Close the connection
mysqli_close($connection);
?>
