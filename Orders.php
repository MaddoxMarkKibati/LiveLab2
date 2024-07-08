<?php
include_once("Templates/Header.php");
include_once("Templates/Nav.php"); 
require_once("Connection/DBConnect.php");

// Function to add an order
function add_order($conn, $service_id, $name, $email, $description, $from_date, $to_date) {
    $query = "INSERT INTO `orders` (`serviceId`, `name`, `email`, `description`, `fromDate`, `toDate`) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isssss", $service_id, $name, $email, $description, $from_date, $to_date);
    $stmt->execute();
    $stmt->close();
}

// Function to delete an order
function delete_order($conn, $order_id) {
    $query = "DELETE FROM `orders` WHERE `orderId` =?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->close();
}

if (isset($_GET['DelId'])) {
  delete_order($conn, $_GET['DelId']);
  header("Location: ".$_SERVER['PHP_SELF']);
  exit;
}

// Function to count total orders
function count_total_orders($conn) {
    $query = "SELECT COUNT(*) AS totalOrders FROM `orders`";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['totalOrders'];
}

// Function to show order information
function show_order_info($conn) {
  $query = "SELECT o.orderId, o.serviceId, s.serviceName, o.name, o.fromDate, o.toDate 
            FROM `orders` o 
            JOIN `services` s 
            ON o.serviceId = s.serviceId";
  $result = $conn->query($query);
  
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td style='width: 100px;'>".$row['orderId']."</td>";
          echo "<td style='width: 100px;'>".$row['serviceId']."</td>";
          echo "<td style='width: 200px;'>".$row['serviceName']."</td>";
          echo "<td style='width: 200px;'>".$row['name']."</td>";
          echo "<td style='width: 150px;'>".$row['fromDate']."</td>";
          echo "<td style='width: 150px;'>".$row['toDate']."</td>";
          echo "<td style='width: 150px;'>[ <a href='edit_order.php?orderId=".$row['orderId']."'>Edit</a> ] [ <a href='?DelId=".$row['orderId']."' onclick='return confirm(\"Are you sure you want to delete this order permanently from the database?\")'>Del</a> ]</td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan='7'>0 results</td></tr>";
  }
}

?>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="width: 100px;">Order ID</th>
            <th style="width: 100px;">Service ID</th>
            <th style="width: 200px;">Service</th>
            <th style="width: 200px;">Name</th>
            <th style="width: 150px;">From Date</th>
            <th style="width: 150px;">To Date</th>
            <th style="width: 150px;">Actions</th>
        </tr>
    </thead>
    <tbody>
<?php
show_order_info($conn);
?>
    </tbody>
</table>

<?php
// Close the connection
$conn->close();

include_once("Templates/Footer.php");?>