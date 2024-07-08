<?php
include_once("Templates/Header.php");
include_once("Templates/Nav.php"); 
require_once("Connection/DBConnect.php");

if (isset($_GET["serviceId"])) {
    $service_id = mysqli_real_escape_string($conn, $_GET["serviceId"]);

    $spot_service = "SELECT * FROM `services` WHERE serviceId = '$service_id' LIMIT 1";
    $spot_service_res = $conn->query($spot_service);
    $spot_service_row = $spot_service_res->fetch_assoc();

    if (isset($spot_service_row)) {
        if(isset($_POST["update_services"])){
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $service = mysqli_real_escape_string($conn, $_POST["service"]);
            $description = mysqli_real_escape_string($conn, $_POST["description"]);
            $from_date = mysqli_real_escape_string($conn, $_POST["from-date"]);
            $to_date = mysqli_real_escape_string($conn, $_POST["to-date"]);

            $update_services = "UPDATE services SET name = '$name', email = '$email', serviceName = '$service', description = '$description', fromDate = '$from_date', toDate = '$to_date' WHERE serviceId='$service_id' LIMIT 1";
      
            if ($conn->query($update_services) === TRUE) {
                header("Location: view_services.php");
                exit();
            } else {
                echo "Error: " . $update_services . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Service not found";
    }
} else {
    echo "No service ID provided";
}
?>

<div class="segment body">
        
    <div class="row">
        <div class="content">
        <h1>Update Service</h1>
        <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contact_form">
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" placeholder="Name" required value="<?php if (isset($spot_service_row)) { print $spot_service_row["name"]; } ?>"><br><br>

            <label for="email">Email Address:</label><br>
            <input type="email" id="email" name="email" placeholder="Email address" required value="<?php if (isset($spot_service_row)) { print $spot_service_row["email"]; } ?>"><br><br>
        
            <label for="service">Service:</label><br>
            <input type="text" name="service" id="service" placeholder="Service" required value="<?php if (isset($spot_service_row)) { print $spot_service_row["serviceName"]; } ?>"><br><br>

            <label for="description">Description:</label><br>
            <textarea cols="30" rows="7" name="description" id="description" required><?php if (isset($spot_service_row)) { print $spot_service_row["description"]; } ?></textarea><br><br>

            <label for="from-date">From Date:</label><br>
            <input type="date" name="from-date" id="from-date" required value="<?php if (isset($spot_service_row)) { print $spot_service_row["fromDate"]; } ?>"><br><br>

            <label for="to-date">To Date:</label><br>
            <input type="date" name="to-date" id="to-date" required value="<?php if (isset($spot_service_row)) { print $spot_service_row["toDate"]; } ?>"><br><br>

            <input type="submit" name="update_services" value="Update Service" >
            <input type="hidden" name="serviceId" value="<?php if (isset($spot_service_row)) { print $spot_service_row["serviceId"]; } ?>" >
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>