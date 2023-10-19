

<?php
// Connect to MySQL database
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "saiherng";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$specialty = $_POST['specialty'];
$service = $_POST['service'];
$img_url = $_POST['img_url'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert user data into database
$sql = "INSERT INTO user (username, name, email, password, address, city, specialty, service, img_url)
VALUES ('$username', '$name','$email', '$password','$address','$city','$specialty', '$service','$img_url')";

if ($conn->query($sql) === TRUE) {
    
    $msg = "User: $username created successfully!";
    header("Location: login.php?message=" . urlencode($msg));
    exit();
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>