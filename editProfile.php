<?php


// Start or resume the session
session_start();
// Check if the session is active
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){

} else{
  header('Location: login.php');
}


$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "saiherng";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
      
  $specialty = $_POST["specialty"];
  $city = $_POST["city"];
  $service = $_POST['service'];
  $username = $_POST['username'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $name = $_POST['name'];
  $user_id = $_POST['user_id'];
  
  $sql = "UPDATE user SET specialty='$specialty', name='$name', city='$city', service='$service', username='$username', address='$address', phone='$phone'  WHERE id='$user_id'";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {

    $msg = "User Profile Chaged";
    header("Location: updateProfile.php?message=" . urlencode($msg));
       
} else {
    $msg = "User Update Failed";
    header("Location: updateProfile.php?message=" . urlencode($msg));
}
}
?>