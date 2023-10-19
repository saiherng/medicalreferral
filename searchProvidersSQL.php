
<?php

session_start();

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
                <a class="nav-link" href="messages.php">Messages</a>
              </li>

            </ul>

            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
            <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                 
            <?php
                   
                    $email = $_SESSION['user_email'];
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
    

    <section style="background-color: lightblue; min-height: 100vh; height:auto;" >
    <div class="container">
      <?php
          echo "<div class='lead font-weight-bold' >Welcome <strong>$username</strong>,</div>";
        ?>
        <h1>Search Primary Care</h1>
          <form method="POST" autocomplete="off" action="<?php $_PHP_SELF ?>">
            <label for="specialty">Specialty:</label>
            <select id="specialty" name="specialty">
              <option value="">--Select specialty--</option>
              <option value="General Practitioner">General Practitioner</option>
              <option value="Dentist">Dentist</option>
              <option value="Dermatologist">Dermatologist</option>
              <option value="Family Physician">Family Physician</option>
              <option value="Gynecologist">Gynecologist</option>
              <option value="Neurologist">Neurologist</option>
            </select>
            <select id="city" name="city">
              <option value="">--Select city--</option>
              <option value="Fullerton">Fullerton</option>
              <option value="Anaheim">Anaheim</option>
              <option value="Brea">Brea</option>
            </select>
            <select id="service" name="service">
              <option value="">--Select Healthcare Type --</option>
              <option value="Doctor">Doctor</option>
              <option value="Provider">Provider</option>
            </select>
            
            <button type="submit">Search</button>
          </form>
          
          </br>
      </div>
  
    <div class="container">
        <div class="card-group" >
      
    <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
      
      $specialty = $_POST["specialty"];
      $city = $_POST["city"];
      $service = $_POST['service'];

      $sql = "SELECT * FROM user WHERE service='$service'";
    if ($specialty && $city && $service){
      $sql = "SELECT * FROM user WHERE specialty='$specialty' AND city='$city' AND service='$service'";
    }
    elseif ($specialty and $city){
      $sql = "SELECT * FROM user WHERE specialty='$specialty' AND city='$city'";
    }
    elseif ($specialty and $service){
      $sql = "SELECT * FROM user WHERE specialty='$specialty' AND service='$service'";
    }
    elseif ($city and $service){
      $sql = "SELECT * FROM user WHERE specialty='$specialty' AND service='$service'";
    }    
    elseif ($specialty){
      $sql = "SELECT * FROM user WHERE specialty='$specialty'";
    }
    elseif ($city){
      $sql = "SELECT * FROM user WHERE city='$city'";
    }
    elseif ($service){
      $sql = "SELECT * FROM user WHERE service='$service'";
    }

  

  $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           $name = $row['name'];
           $spec = $row['specialty'];
           $email = $row['email'];
           $city = $row['city'];
           $address = $row['address'];
           $phone = $row['phone'];
           $service = $row['service'];
           $img_url = $row['img_url'];

                    echo '<div class="col-3">';
                    echo '<div class="card mb-1" style="max-width: 20rem;">';
                    echo "<img class='card-img-top' src='$img_url' style='border-radius:8px;
                    height: 200px; object-fit:contain;' alt='Card image cap'>";
                    echo  '<div class="card-body">';
                    echo  "<h3 class='card-title'>$name </h3>";
                    echo  "<h5 class='card-title'>$spec</h5>";
                    echo  "<p class='card-text'>Type: $service</p>";
                    echo  "<p class='card-text'>Location: $address</p>";
                    echo  "<p class='card-text'>City: $city</p>";
                    echo  "<p class='card-text'>Phone: $phone</p>";
                    echo  "<p class='card-text'>Email: $email</p>";
                    echo  '<form method="get" action="sendMessage.php">';
                    echo  "<input name='arg' type='hidden' value='$email'>";
                    echo  "<button type='submit' class='btn btn-warning '>Send Message</button>";
                    echo  "</form></p>";
                    echo  '<form method="get" action="schedule.php">';
                    echo  "<input name='arg' type='hidden' value='$email'>";
                    echo  "<button type='submit' class='btn btn-success '>Schedule Meeting</button>";
                    echo  "</form></p>";


                    echo  '</div></div></div>';
 
        
        }

    }
      };
    ?>
    </div>
  </div>
    </section>
    
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>

</html>