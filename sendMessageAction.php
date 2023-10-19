<?php
// Retrieve form data

$to = $_POST['to_email'];
$from = $_POST['from_email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

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

$server_timezone = date_default_timezone_get();
$california_timezone = new DateTimeZone('America/Los_Angeles');

$datetime = new DateTime('now', $california_timezone);
$current_time = $datetime->format('H:i:s');

$current_date = date('Y-m-d');


// Prepare and execute the SQL query
$sql = "INSERT INTO messages (to_email, from_email, date, time, subject, message) VALUES ('$to', '$from','$current_date','$current_time','$subject','$message')";

if (mysqli_query($conn, $sql) === TRUE) {
    header("Location: messages.php");
exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>