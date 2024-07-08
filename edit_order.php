<?php
include_once("Templates/Header.php");
include_once("Templates/Nav.php");
require_once("Connection/DBConnect.php");

// Function to get order information by ID
function get_order_info($conn, $order_id) {
    $query = "SELECT o.orderId, o.serviceId, s.serviceName, o.name, o.email, o.description, o.fromDate, o.toDate 
               FROM `orders` o 
               JOIN `services` s ON o.serviceId = s.serviceId 
               WHERE o.orderId =?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        error_log("No order found with ID $order_id");
        return null;
    }
}

// Function to update an order
function update_order($conn, $order_id, $service_id, $name, $email, $description, $from_date, $to_date) {
    $query = "UPDATE `orders` SET `serviceId` =?, `name` =?, `email` =?, `description` =?, `fromDate` =?, `toDate` =? 
               WHERE `orderId` =?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isssssi", $service_id, $name, $email, $description, $from_date, $to_date, $order_id);
    $stmt->execute();
    $affected_rows = $stmt->affected_rows;
    $stmt->close();
    return $affected_rows;
}

// Test data
$order_id = 2; // Replace with the ID of the order you want to update

// Get current order information
$order_info = get_order_info($conn, $order_id);
if ($order_info === null) {
    echo "No order found with ID $order_id";
    include_once("Templates/Footer.php");
    exit; // Stop executing the script
}

// HTML form to test the update functionality
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td>Service ID:</td>
            <td>
                <select name="service_id">
                    <?php
                    $query = "SELECT * FROM `services`";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='". $row['serviceId']. "'>". $row['serviceName']. "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $order_info['name'];?>"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" value="<?php echo $order_info['email'];?>"></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><textarea name="description"><?php echo $order_info['description'];?></textarea></td>
        </tr>
        <tr>
            <td>From Date:</td>
            <td><input type="date" name="from_date" value="<?php echo $order_info['fromDate'];?>"></td>
        </tr>
        <tr>
            <td>To Date:</td>
            <td><input type="date" name="to_date" value="<?php echo $order_info['toDate'];?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="update" value="Update Order"></td>
        </tr>
    </form>

<?php
if (isset($_POST['update'])) {
    $service_id = $_POST['service_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    $affected_rows = update_order($conn, $order_id, $service_id, $name, $email, $description, $from_date, $to_date);

    if ($affected_rows > 0) {
        echo "Order updated successfully!<br>";
    } else {
        echo "Error updating order!<br>";
    }
}

include_once("Templates/Footer.php"); ?>