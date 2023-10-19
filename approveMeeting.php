<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "saiherng";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the arguments from the URL
    $meeting_id = $_GET['meeting_id'];

    $sql = "UPDATE events SET status='Approved' WHERE id='$meeting_id'";

    if ($conn->query($sql) === TRUE) {

        header('Location: appointments.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
    exit();

}



?>