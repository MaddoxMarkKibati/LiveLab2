<?php
include_once("Templates/Header.php");
include_once("Templates/Nav.php");  
require_once("Connection/DBConnect.php");

// Function to add an order
function add_order($conn, $service_id, $name, $email, $description, $from_date, $to_date) {
    $query = "INSERT INTO `orders` (`serviceId`, `name`, `email`, `description`, `fromDate`, `toDate`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isssss", $service_id, $name, $email, $description, $from_date, $to_date);
    $stmt->execute();
    $stmt->close();
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $service = $_POST["service"];
    $description = $_POST["description"];
    $from_date = $_POST["from-date"];
    $to_date = $_POST["to-date"];

    // Retrieve the service ID from the database
    $query = "SELECT `serviceId` FROM `services` WHERE `serviceName` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $service);
    $stmt->execute();
    $result = $stmt->get_result();
    $service_id = $result->fetch_assoc()["serviceId"];
    $stmt->close();

    // Add the order to the database
    add_order($conn, $service_id, $name, $email, $description, $from_date, $to_date);

    // Close the connection
    $conn->close();

    // Redirect to a success page or display a success message
    header("Location: success.php");
    exit;
}

// Display the services page
?>

<!--Class for body/main content section-->
<h1>Atlas Corporation: Your Global Shipping Partner</h1>
<p>At Atlas Corporation, we understand the importance of getting your cargo where it needs to be, on time and on budget. That's why we offer a comprehensive suite of shipping solutions to meet your specific needs.</p>

<h2>Global Shipping Services</h2>
<!--General text explaining the shipping services-->

<table class="table table-striped">  
  <thead>  
    <tr>  
      <th scope="col">Service</th>  
      <th scope="col">Description</th>  
    </tr>
  </thead>
  <tbody>  
    <tr>
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
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">            
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
        <?php
        $query = "SELECT `serviceName` FROM `services`";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["serviceName"] . "'>" . $row["serviceName"] . "</option>";
        }
        ?>
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

<?php include_once("Templates/Footer.php");?>