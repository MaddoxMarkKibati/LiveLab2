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
          <h1>Atlas Corporation: Your Global Shipping Partner</h1>
          <p>At Atlas Corporation, we understand the importance of getting your cargo where it needs to be, on time and on budget. That's why we offer a comprehensive suite of shipping solutions to meet your specific needs.</p>
          
          <h2>Global Shipping Services</h2>
          <!--General text explaining the shipping services-->

          <table class="table table-striped">  <thead>  <tr>  <th scope="col">Service</th>  <th scope="col">Description</th>  </tr>
          </thead>
          <tbody>  <tr>
              <td>Freight Shipping</td>
              <td>
                <ul>
                  <li>Air Freight: Expedited services for fast delivery.</li>
                  <li>Ocean Freight: Cost-effective for larger shipments.</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Express Shipping</td>
              <td>Guaranteed rapid delivery times for urgent cargo.</td>
            </tr>
            <tr>
              <td>Cargo Insurance</td>
              <td>Protects your investment with comprehensive coverage options.</td>
            </tr>
            <tr>
              <td>Local Shipping</td>
              <td>Reliable and efficient local services within Nairobi and surrounding areas.</td>
            </tr>
          </tbody>
        </table>

        <section id="service-form">
          <h2>Request a Service</h2>
          <form action="process_form.php" method="post">            
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" required>
            <span id="name-error"></span>
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <span id="email-error"></span>
            <br>

            <label for="service">Service:</label>
            <select name="service" id="service">
              <option value="oceanfreight_shipping">Ocean Freight Shipping</option>
              <option value="airfreight_shipping">Air Freight Shipping</option>
              <option value="express_shipping">Express Shipping</option>
              <option value="cargo_insurance">Cargo Insurance</option>
              <option value="local_shipping">Local Shipping</option>
            </select>
            <br>
          
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="5"></textarea>
            <br>

            <label for="from-date">From Date:</label>
            <input type="date" name="from-date" id="from-date" required>
            <span id="date-error"></span>
            <br>
        
            <label for="to-date">To Date:</label>
            <input type="date" name="to-date" id="to-date" required>
            <br>
        
            <button type="submit">Submit Request</button>
          </form>
          </section>
      
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>