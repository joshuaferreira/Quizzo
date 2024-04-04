<?php
// Database connection details
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'quizzo'; // Change this to your actual database name

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    // Check if username already exists
    $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check_username_sql);
    if ($result->num_rows > 0) {// Username already exists
        $alertMessage = "Username already exists";
        echo '<script>
            alert("' . $alertMessage . '");
        </script>';
        echo '<script>window.location.href = "register.html";</script>';
        exit();

    } else {
        // SQL insert statement
        $sql = "INSERT INTO users (username, password, firstName, lastName, email) VALUES ('$username', '$password', '$firstName', '$lastName', '$email')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            // Success alert message
            $alertMessage = "Record inserted successfully";
            echo '<script>alert("' . $alertMessage . '");</script>';
            echo '<script>window.location.href = "login.html";</script>';
            exit(); // Stop further execution
        } else {
            // If there's an error, display error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
