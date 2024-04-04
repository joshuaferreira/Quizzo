<?php
// Database connection details
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

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // SQL insert statement
    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo '<script>
            alert("Record inserted successfully");
            window.location.href = "contact.html";
        </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
