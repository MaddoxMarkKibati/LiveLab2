<?php include_once("Templates/Header.php");
      include_once("Templates/Nav.php"); 
      require_once("Connection/DBConnect.php");

      if(isset($_POST["sign_in"])){
        $email = mysqli_real_escape_string($conn, $_POST["email_address"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // verify email format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ?wrong_email_format");
            exit();
        }

        // query to check if email and password exist in the database
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($query);

        if($result->num_rows > 0){
            // login successful, redirect to home page
            header("Location: index.php");
            exit();
        } else {
            echo "Error: Invalid email or password";
        }
    }
?>

<!--Class for body/main content section-->
<h2>Sign In</h2>
<form action="signin.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email_address" id="email" required>
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>

    <button type="submit" name="sign_in">Sign In</button>
    <br>
    <a href="SignUp.php">Don't have an account? Sign up instead!</a>
</form>

<?php include_once("Templates/Footer.php");?>