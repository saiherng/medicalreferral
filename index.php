<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Medical System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container-fluid navbar-container" style="background-color: #fdfdfd">
        <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                <a class="navbar-brand col-lg-3 me-0" href="index.php">Scheduling System</a>

                <?php
                session_start();
                
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
                      <a class="nav-link" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link" href="messages.php">Messages</a>
                     </li>
       
                  </ul>
      
                  <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                  <div class="dropdown text-end">
                  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                  echo "<div class='lead font-weight-bold' ><strong> $username </strong></div></a>";
                    
                    echo "<ul class='dropdown-menu text-small' >
                    <li><a class='dropdown-item' href='updateProfile.php'>Edit Profile</a></li>
                    <li><a class='dropdown-item' href='signout.php'>Sign out</a></li>
                </ul>";
                }
                    
                    
                  ?>        
              </div>
            </div>

                
            
        </nav>
    </div>

    <section style="background-image: url(wallpaper.jpeg); background-repeat: no-repeat; background-size: cover;">
        <div class="container" >
            
            <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
                        $username = $_SESSION['username'];
                        echo "<h1 class='cover-heading'>Welcome $username,</h1>";
                    } else {
                        echo "<h1 class='cover-heading'>Medical Referral Service</h1>";
                    }

                  ?>
            

            <p class="lead" style="color: rgb(39, 33, 33); width: 70%; padding-bottom: 30px;">Our medical referral service is a platform that connects healthcare providers and doctors, 
                making it easier for patients to receive specialized care. Through our service, 
                providers can refer patients to other providers or specialists, and doctors can 
                receive referrals from other providers or hospitals. Our aim is to streamline the referral 
                process and ensure patients receive the best possible care, with prompt and efficient communication
                 between healthcare providers. </p>

            <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                    
                    echo"<button class='btn btn-lg btn-success'>
                    <a href='searchProvidersSQL.php' style='text-decoration: none; color: white'>Search Providers</a>
                    </button>";
                } else {
                    echo"<button class='btn btn-lg btn-success'>
                    <a href='login.php' style='text-decoration: none; color: white'>Login</a>
                    </button>
                    <button class='btn btn-lg btn-danger'>
                    <a href='signup.html' style='text-decoration: none; color: white'>Signup</a>
                    </button>";

                }
        
                    
            ?>  

            

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>