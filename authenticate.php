<?php
session_start();

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
$servername = "localhost:3306";
$dbusername = "root";
$dbpassword = "";
$dbname = "saiherng";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a SQL statement to check for the user
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


// Check if the user exists
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Check if the password is correct
    if ( password_verify($password, $row['password']) ) {
        // Set session variables
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['logged_in'] = true;
        // Redirect to the homepage
        header('Location: index.php');
        exit();
    } else {
        
        $error_msg = "Invalid Password. Please try again!";
        header("Location: login.php?message=" . urlencode($error_msg));
        exit();
    }
} else {
    
    $error_msg = "Invalid Username. Please try again!";
    header("Location: login.php?message=" . urlencode($error_msg));
    exit();
}

// Close the connection
$stmt->close();
$conn->close();
?>