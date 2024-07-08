<?php include_once("Templates/Header.php");
      include_once("Templates/Nav.php"); 
      require_once("Connection/DBConnect.php");

      if(isset($_POST["sign_up"])){
        $fullname = $_POST["fullname"];
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $genderId = mysqli_real_escape_string($conn, $_POST["genderId"]);
        $roleId = mysqli_real_escape_string($conn, $_POST["roleId"]);
    
        $insert_user = "INSERT INTO users (fullname, email, username, password, genderId, roleId, datecreated, dateupdated) 
        VALUES ('$fullname', '$email', '$username', '$password', '$genderId', '$roleId', NOW(), NOW())";
        
        $conn->query($insert_user);
    }
?>
            
        <!--Class for body/main content section-->
            <h2>Sign Up</h2>
            <form action="signup.php" method="post">  
              <label for="fullname">Fullname:</label>
              <input type="text" name="fullname" id="fullname" required>
              <br>

              <label for="username">Username:</label>
              <input type="text" name="username" id="username" required>
              <br>
            
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" required>
              <br>
            
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" required>
              <br>

              <label for="genderId">Gender:</label><br>
              <select name="genderId" id="genderId" required>
              <option value="">--Select Gender--</option>
              <?php
              $sel_rol = "SELECT * FROM `gender` ORDER BY gender ASC";
              $sel_rol_res = $conn->query($sel_rol);
              while($sel_rol_row = $sel_rol_res->fetch_assoc()) {
              ?>
              <option value="<?php print $sel_rol_row["genderId"]; ?>"><?php print $sel_rol_row["gender"]; ?></option>
              <?php } ?>
              </select>
              <br>

              <label for="roleId">Role:</label><br>
              <select name="roleId" id="roleId" required>
              <option value="">--Select Role--</option>
              <?php
              $sel_rol = "SELECT * FROM `roles` ORDER BY role ASC";
              $sel_rol_res = $conn->query($sel_rol);
              while($sel_rol_row = $sel_rol_res->fetch_assoc()) {
              ?>
              <option value="<?php print $sel_rol_row["roleId"]; ?>"><?php print $sel_rol_row["role"]; ?></option>
              <?php } ?>
              </select>
              <br>

              <input type="submit" name="sign_up" value="Sign Up" >
              <br>
              <a href="SignIn.php">Have an account? Sign in instead!</a>
            </form>
      
        </div>
        
        <script src="script.js"></script>

<?php include_once("Templates/Footer.php");?>