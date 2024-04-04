<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtain form data
    $username = "username";
    $user = trim($_POST["user"]);
    $password = trim($_POST["password"]);
    $remember = isset($_POST["remember"]);
    echo $remember;

    // Database connection
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'quizzo';
    
    /*
    $host = 'sql6.freemysqlhosting.net';
    $dbusername = 'sql6695846';
    $dbpassword = 'ElxPjNZ3WW';
    $dbname = 'sql6695846';
    */

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement (to prevent SQL injection)
    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($query);

    // Check if preparation was successful
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    // Bind parameters and execute query
    $stmt->bind_param("ss", $user, $password);
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Redirect if user is found
        $row = mysqli_fetch_array($result);
        $user = $row[0];

        
        echo 
            '<script type="text/JavaScript">  
                alert(`Successful Login`); 
                if(' . ($remember ? 'true' : 'false') . ') {
                    localStorage.setItem("username", "' . $user . '");
                } else {
                    sessionStorage.setItem("username", "' . $user . '");
                }
                // Set session storage and then redirect
                sessionStorage.setItem("redirected", "true");
                window.location.href = "home.html";
            </script>';

        exit();
    } else {
        // Failed login attempt
        echo "Failed";
        exit();
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
