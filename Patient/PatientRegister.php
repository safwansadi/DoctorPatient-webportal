<!DOCTYPE html>
<html>
<head>
  <title>Patient Register</title>
  <link rel="stylesheet" type="text/css" href="../Assets/Register.css"/>
</head>
<body>
<form action="PatientRegister.php" method = 'POST'>
  <div class="header_inc">
    <h2>Registration Form</h2>
  </div>
  <div class="personal_div">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="birthday">Birthday:</label>
  <input type="date" id="birthday" name="birthday"><br><br>
  <label for="gender">Gender:</label>
  <select id="gender" name="gender">
    <option value="male">male</option>
    <option value="female">female</option>
    <option value="other">others</option>
  </select><br><br>
  <div class="location">
    <label>Location : </label>
    <textarea id="location" name="location" rows="1" cols="50" required> Location </textarea>
  </div>
  
  <label for="psw"><b>Password</b></label>
    <input type="password:" placeholder="Enter Password" name="password" id="password" required>
    <br>
    <label for="confirmpassword"><b>Repeat Password</b></label>
    <input type="password" placeholder="confirmpassword" name="confirmpassword" id="confirmpassword" required>
    <hr>
    <input type="submit" class="registerbtn" name ="submit_patient" value="Submit">
    <hr>
    <a href="../Login_Info.php" class="back_login_Submit">Back To Login Info Page</a>
    <?php
      if (isset($_POST['password'])){
        $password = $_POST['password'];
        $cpassword = $_POST['confirmpassword'];
        if($password != $cpassword){
          $msg = "passwords doesn't match";
      }
          }
    ?>

  </div>
  

</form>

</body>
</html>
<?php
  if(isset($_POST['submit_patient'])){

    echo "ok";  
      $userName = $_POST['name'];
      $userEmail = $_POST['email']; 
      $userPassword = $_POST['password'];
      $BirthDate = $_POST['birthday'];
      $Gender = $_POST['gender'];
      $Location = $_POST['location'];

      $connection = mysqli_connect('127.0.0.1', 'root', '', 'docpatportal'); 
      if($connection-> connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "INSERT INTO patientrequest_table(NAME,EMAIL,Birth_Date,Gender,Location,Password) VALUES ('".$userName."','".$userEmail."', '".$BirthDate ."', '".$Gender."', '".$Location."','".$userPassword."')";
      if($connection->query($sql) === TRUE) {
          echo "Registration Completed!";
      } else {
          echo "ERROR: " . $sql . "<br>" . $connection->error;
      }
    }
?>