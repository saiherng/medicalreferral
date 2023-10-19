<?php


// Check if the session is active
session_start();

if (isset($_SESSION['user_id'])) {
  
} else{
  header('Location: login.php');
}


$servername = "localhost:3306";
$dbusername = "root";
$dbpassword = "";
$dbname = "saiherng";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medical System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    <link rel="stylesheet" href="style.css">

  </head>
<body>
    <div class="container-fluid navbar-container" style="background-color: #fdfdfd;">
      <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0" href="index.php">Scheduling System</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center gap-5">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="searchProvidersSQL.php">Search</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="appointments.php">Appointments</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="messages.php">Message</a>
              </li>
 
            </ul>

            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
            <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                 
            <?php
                    
                    $username = $_SESSION['username'];
                    echo "<div class='lead font-weight-bold' ><strong> $username </strong></div>";
                  ?>        
                </a>
                <ul class="dropdown-menu text-small" >
                <li><a class='dropdown-item' href='updateProfile.php'>Edit Profile</a></li>
                  <li><a class="dropdown-item" href='signout.php'>Sign out</a></li>
                </ul>
              </div>
          </div>

          </div>
        </div>
      </nav>
    </div>

    <section style="background-image: url(wallpaper.jpeg); background-repeat: no-repeat; background-size: cover;">
    <div class="container">

        <h1 class="text-success">Received Messages</h1>
          
        <table class="table table-bordered table-hover table-light" >
    <thead>
        <tr>
            <th>ID</th>
            <th>From</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
    <?php
    $email = $_SESSION['user_email'];
    $sql = "SELECT * FROM messages WHERE to_email='$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $message_id = $row["id"];
            $from_email = $row['from_email'];
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["from_email"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";

            echo "  <td><form action='replyMessage.php' method='GET'>
            <input type='hidden' name='arg' value='$from_email'>
            <input class='btn btn-success' type='submit' value='Reply'>
          </form></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No Messages</td></tr>";
    }
    ?>
    </tbody>
    </table>
       
    </div>
    <div class="container">

        <h1>Sent Messages</h1>
          
        <table class="table table-striped table-hover table-light" >
    <thead>
        <tr>
            <th>ID</th>
            <th>To</th>
            <th>Date</th>
            <th>Time</th>
            <th>Subject</th>
            <th>Message</th>


        </tr>
    </thead>
    <tbody>
    <?php
    $email = $_SESSION['user_email'];
    $sql = "SELECT * FROM messages WHERE from_email='$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["to_email"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "<td>" . $row["subject"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";

            
           
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No Messages</td></tr>";
    }
    ?>
    </tbody>
    </table>
       
    </div>
  </div>
    </section>
    
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>

</html>