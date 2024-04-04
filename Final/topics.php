<?php
    // Database connection
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'quizzo';

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch quiz ID from request
    $quizID = $_GET['quizID'];

    // Fetch topic information based on quiz ID
    $sql = "SELECT * FROM topics WHERE cat_id = $quizID";
    $result = $conn->query($sql);

    // Check if result contains data
    if ($result->num_rows > 0) {
        // Fetch data row
        $row = $result->fetch_assoc();

        // Create an associative array with topic information
        $topicInfo = array(
            'quiz_title' => $row['cat_name'],
            'quiz_description' => $row['description']
        );

        // Convert array to JSON and output
        echo json_encode($topicInfo);
    } else {
        echo "No topics found for the given quiz ID";
    }

    // Close database connection
    $conn->close();
?>