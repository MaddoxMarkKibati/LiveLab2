<?php
include_once("Templates/Header.php");
include_once("Templates/Nav.php"); 
require_once("Connection/DBConnect.php");

// Function to count total feedback
function count_total_feedback($conn) {
    $query = "SELECT COUNT(*) AS totalFeedback FROM `feedback`";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['totalFeedback'];
}

// Function to show feedback information
function show_feedback_info($conn) {
  $query = "SELECT * FROM `feedback`";
  $result = $conn->query($query);
  
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td style='width: 100px;'>".$row['feedbackId']."</td>";
          echo "<td style='width: 200px;'>".$row['name']."</td>";
          echo "<td style='width: 200px;'>".$row['email']."</td>";
          echo "<td style='width: 400px;'>".$row['message']."</td>";
          echo "<td style='width: 150px;'>".$row['datecreated']."</td>";
          echo "<td style='width: 150px;'>[ <a href='edit_feedback.php?feedbackId=".$row['feedbackId']."'>Edit</a> ] [ <a href='?DelId=".$row['feedbackId']."' onclick='return confirm(\"Are you sure you want to delete this feedback permanently from the database?\")'>Del</a> ]</td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan='5'>0 results</td></tr>";
  }
}

if (isset($_GET['DelId'])) {
  $query = "DELETE FROM `feedback` WHERE `feedbackId` =?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $_GET['DelId']);
  $stmt->execute();
  $stmt->close();
  header("Location: ".$_SERVER['PHP_SELF']);
  exit;
}

?>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="width: 100px;">Feedback ID</th>
            <th style="width: 200px;">Name</th>
            <th style="width: 200px;">Email</th>
            <th style="width: 400px;">Message</th>
            <th style="width: 150px;">Date Created</th>
            <th style="width: 150px;">Actions</th>
        </tr>
    </thead>
    <tbody>
<?php
show_feedback_info($conn);
?>
    </tbody>
</table>

<?php
// Close the connection
$conn->close();

include_once("Templates/Footer.php");?>