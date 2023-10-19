<?php
// Retrieve form data
$to = $_POST['to_email'];
$from = $_POST['from_email'];
$date = $_POST['date'];
$time = $_POST['time'];
$address = $_POST['address'];
$message = $_POST['message'];

// Connect to the database
$servername = "localhost:3306";
$dbusername = "root";
$dbpassword = "";
$dbname = "saiherng";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Prepare and execute the SQL query
$sql = "INSERT INTO events (to_email, from_email, date, time, address, status, message) VALUES ('$to', '$from','$date','$time','$address','Pending','$message')";

if (mysqli_query($conn, $sql) === TRUE) {
    header("Location: appointments.php");
exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>