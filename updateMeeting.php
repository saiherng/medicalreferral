<?php

session_start();

if (isset($_SESSION['user_id'])) {
  
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

// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$user_id = $_SESSION['user_id'];


$sql = "SELECT * from events WHERE id='$meeting_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $meeting_id = $row["id"];
        $from_email = $row["from_email"];
        $to_email = $row["to_email"];
        $message = $row["message"];
        $address = $row["address"];
        $date = $row['date'];
        $status = $row["status"];
        $time = $row["time"];
        
    }
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

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
            <?php
                
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
                    $username = $_SESSION['username'];

                    echo '<ul class="navbar-nav col-lg-6 justify-content-lg-center gap-5">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link" href="searchProvidersSQL.php">Search</a>
                  </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="searchProvidersSQL.php">Appointments</a>
                    </li>
       
                  </ul>
      
                  <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                  <div class="dropdown text-end">
                  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                  echo "<div class='lead font-weight-bold' ><strong> $username </strong></div></a>";
                    
                    echo "<ul class='dropdown-menu text-small' >
                    <li><a class='dropdown-item' href='editProfile.php'>Edit Profile</a></li>
                    <li><a class='dropdown-item' href='signout.php'>Sign out</a></li>
                </ul>";
                }
                    
                    
                  ?>  
          </div>
        </div>
      </nav>
    </div>
    

    <section style="background-image: url(wallpaper.jpeg); background-repeat: no-repeat; background-size: cover;">
      <div class="container">
        <h1>Modify Meeting Request</h1> <?php
      // Retrieve the error message from the query parameter
      $message = isset($_GET['message']) ? $_GET['message'] : '';
      // Display the error message
      echo "<p class='text-danger'>$message</p>";
      ?>  
        <form method="POST" action="editMeeting.php" method="POST">
        <input type="hidden" name="meeting_id" value='<?php echo $meeting_id?>' >
        <table>
    <tr>
      <td><label>From:</label></td>
      <td><input type="text" name="from_email" value='<?php echo $to_email?>' ></td>
    </tr>
    <tr>
      <td> <label>To:</label></td>
      <td> <input type="text" name="to_email" value='<?php echo $from_email?>'> </td>
      </tr>
    <tr>
      <td><label>Date:</label></td>
      <td><input type="date" name="date" value='<?php echo $date ?>'></td>
      </tr>
    <tr>
      <td><label>Time:</label></td>
      <td><input type="time" name="time" value='<?php echo $time?>'> </td>
      </tr>
    <tr>
      <td><label>Message:</label></td>
      <td><input type="text" name="message" ></td>
      </tr>
      <tr>
      <td><label>Status:</label></td>
      <td><input type="text" name="status" value='Modifying'></td>
      </tr>


    
  </table>
            <br>

            <!-- <label>Confirm Password:</label><br>
            <input type="password_comfirm" name="password_comfirm" required><br> -->
            <button class="btn btn-warning" type="submit">Update</button>
        </form>

        

        
          
          </br>
      </div>

    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>