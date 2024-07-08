<!DOCTYPE html> <!--Specifies that the document is written in HTML-->
<html>

<head>
  <meta charset="utf-8"> <!--Character encoding-->
  <link rel="stylesheet" href="CSS/GenStructure.css"> <!--Link to GenStructure external CSS which affects the general structure-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/BackImg.css">  <title></title> <!--Link to BackImg external CSS which affects the formatting of the background img-->
</head>

<?php
// Include the database connection file
require_once("Connection/DBConnect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Insert the data into the feedback table
  $query = "INSERT INTO feedback (name, email, message) VALUES (?,?,?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("sss", $name, $email, $message);
  $stmt->execute();

  // Close the statement and connection
  $stmt->close();
  $conn->close();

  // Display a success message
  echo "Thank you for your feedback!";
}
?>

<body>
  <?php include_once("Templates/Nav.php");?>

  <div class="segment body"> <!--Class for body/main content section-->

    <ul class="contact-details"> <!--Unordered list-->
      <!--Contact details list-->
      <li><i class="fas fa-phone-alt"></i> +254 791-208-489</li>
      <li><i class="fas fa-envelope"></i> customercare@atlas.com</li>
      <li><i class="fas fa-map-marker-alt"></i> 123 Mswari street, westlands, Nairobi</li>
    </ul>

    <p>or reach us through:</p>

    <!-- Form to send message -->
    <form method="post">
      <!-- Label and input field for name -->
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <br><br>

      <!-- Label and input field for email -->
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <!-- Textarea for message -->
      <textarea id="message" name="message" rows="5" required></textarea>
      
      <!-- Submit button to send message -->
      <button type="submit">Send Message</button>
    </form>
  </div>

  <?php include_once("Templates/Footer.php");?>
</body>
</html>