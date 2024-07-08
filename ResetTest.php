<?php include_once("Templates/Header.php");
      include_once("Templates/Nav.php"); 
      require_once("Connection/DBConnect.php"); ?>

<!--Class for body/main content section-->
<h2>Reset Credentials</h2>
<form action="reset.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>

    <button type="submit" name="reset_credentials">Reset Credentials</button>
    <br>
    <a href="signin.php">Back to Sign In</a>
</form>

<?php
// Configuration
$issuer = 'Your App Name'; // Issuer name for 2FA

// Function to generate 2FA code
function generate2FACode($username) {
  $code = rand(100000, 999999); // Generate a random 6-digit code
  return $code;
}

// Function to verify 2FA code
function verify2FACode($code, $user_code) {
  if ($code == $user_code) {
    return true;
  } else {
    return false;
  }
}

// Reset credentials form
if (isset($_POST['reset_credentials'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  
  // Check if user exists
  $user_query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
  $user_result = mysqli_query($conn, $user_query);
  if (mysqli_num_rows($user_result) > 0) {
    $user_row = mysqli_fetch_assoc($user_result);
    
    // Generate 2FA code
    $code = generate2FACode($username);
    
    // Send 2FA code to user's email
    $subject = "2FA Code for Resetting Credentials";
    $message = "Your 2FA code is: $code";
    mail($email, $subject, $message);
    
    // Display 2FA code entry form
    ?>
    <h2>Enter 2FA Code</h2>
    <p>Enter the 2FA code sent to your email:</p>
    <form action="reset.php" method="post">
      <input type="hidden" name="username" value="<?php echo $username; ?>">
      <input type="hidden" name="email" value="<?php echo $email; ?>">
      <label for="2fa_code">2FA Code:</label>
      <input type="text" name="2fa_code" id="2fa_code" required>
      <br>
      <label for="new_password">New Password:</label>
      <input type="password" name="new_password" id="new_password" required>
      <br>
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" name="confirm_password" id="confirm_password" required>
      <br>
      <button type="submit" name="verify_2fa">Verify 2FA code</button>
    </form>
    <?php
  } else {
    echo "User not found.";
  }
}

// Verify 2FA code and reset credentials
if (isset($_POST['verify_2fa'])) {
  $2fa_code = $_POST['2fa_code'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  
  // Verify 2FA code
  $code = generate2FACode($username);
  if (verify2FACode($code, $2fa_code)) {
    // Reset credentials
    $update_query = "UPDATE users SET password = '$new_password' WHERE username = '$username' AND email = '$email'";
    mysqli_query($conn, $update_query);
    echo "Credentials reset successfully.";
  } else {
    echo "Invalid 2FA code.";
  }
}
?>

<?php include_once("Templates/Footer.php");?>