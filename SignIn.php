<!DOCTYPE html> <!--Specifies that the document is written in HTML-->

<html>
    <head>
      <title>Atlas Corporation</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="CSS/GenStructure.css"> <!--Link to GenStructure external CSS-->
    </head>

    <body>
        <div class="segment header"> <!--Class for header section-->
          <h1 style="color: #FFFFFF">Atlas Corporation</h1> <!--Formatting the text to have a white font colour-->
          </div>

          <nav class="navbar navbar-expand-lg navbar-light bg-custom navbar-custom-width">
            <div class="container">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
        
                <ul class="navbar-nav">
        
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">About Us</a>
                  </li>
        
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="Express.php">Express Shipping</a>
                      <a class="dropdown-item" href="Frieght.php">Freight Shipping</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="CargoInsurance.php">Cargo Insurance</a>
                    </div>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="Feedback.php">Contact Us</a>
                  </li>
        
                  <li class="nav-item">
                    <a class="nav-link" href="Tracking.php">Tracking</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
            
        <div class="segment body"> <!--Class for body/main content section-->
            <h2>Sign In</h2>
            <form action="signin.php" method="post">  <label for="username">Username:</label>
              <input type="text" name="username" id="username" required>
              <br>
            
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" required>
              <br>
            
              <button type="submit">Sign In</button>
              <br>
              <a href="Signup.php">Don't have an account? Sign Up Here!</a>
            </form>
      
        </div>
        
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>