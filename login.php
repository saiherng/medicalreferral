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




          </div>
        </div>
      </nav>
    </div>

    <section style="background-image: url(wallpaper.jpeg); background-repeat: no-repeat; background-size: cover;">

    <div class="container">
    <h2>Login Form</h2><br><br>

    <form method="post" action="authenticate.php">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required><br><br>
  
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>
  
      <button type="submit" class="btn btn-success">Login</button>
      
      <?php
      // Retrieve the error message from the query parameter
      $message = isset($_GET['message']) ? $_GET['message'] : '';

      // Display the error message
      echo "</br></br><p class='text-danger'>$message</p>";
      ?>  
      

      </div>
    </form>

      </div>

    </section>

    
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
	  <script src="script.js"></script>
  </body>
</html>


