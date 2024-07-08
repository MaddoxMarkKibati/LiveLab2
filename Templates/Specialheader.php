<!DOCTYPE html> <!--Specifies that the document is written in HTML-->
<html>

<head>
  <meta charset="utf-8"> <!--Character encoding-->
  <link rel="stylesheet" href="CSS/GenStructure.css"> <!--Link to GenStructure external CSS which affects the general structure-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/BackImg.css">  <title></title> <!--Link to BackImg external CSS which affects the formatting of the background img-->
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

  <div class="segment body"> 