<?php

session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){

} else{
  header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medical System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
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
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="searchProvidersSQL.php">Search</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="appointments.php">Appointments</a>
              </li>
   
            </ul>

            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
            <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                 
            <?php
                    
                    $username = $_SESSION['username'];
                    $name = $_SESSION['user_name'];
                    $from_email = $_SESSION['user_email'];


                    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                      if (isset($_GET['arg'])) {
                        $_SESSION['to_email'] = $_GET['arg'];
                        $to_email = $_SESSION['to_email'];
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
      <h1>Scheduling Form</h1>

        <?php
          
              echo "<p class='lead'>Sending Meeting Request</p> <h4>To:&nbsp;&nbsp;$to_email</h4>";}
              }
              
        ?> 
        </br>


        <h4>From : </h4>
        <!-- <form id="schedule-form" autocomplete="off" onsubmit="submitScheduleRequestForm(event)"> -->
        <form autocomplete="off" action="submitMeetingRequest.php" method="post">
          <!-- <label for="name">Name:</label>
          <input type="text" id="name" name="name" value=""><br><br>-->
          <input type="hidden" id="to_email" name="to_email" value="<?php echo "$to_email" ?>">
          
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value='<?php
                   echo "$name"; ?>' >         
          <br><br>
          <label for="from_email">Email:</label>
          <input type="text" id="from_email" name="from_email" value='<?php
                   echo "$from_email"; ?>' >
                   <br>
          <label for="time">Date:</label>
          <input type="date" id="date" name="date"><br><br>
  
          <label for="time">Time:</label>
          <input type="time" id="time" name="time"><br><br>

          <label for="address">Meeting Address:</label>
          <input type="address" id="address" name="address"><br><br>
  
          <label for="message">Message:</label><br>
          <textarea id="message" name="message"></textarea><br><br>
  
          <input type="submit" value="Submit">
        </form>
      </br>
      </div>

    </section>
    
    


        
	

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
	  <script src="script.js"></script>
  </body>
</html>