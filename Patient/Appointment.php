<?php 
  require_once('../db.php');
  $connection = dbConnection();
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../Assets/Appointment.css" media="screen"/>
  <title>Appointment</title>
  
</head>
<body>
  <div class="titlebar">
    <h1> Welcome To Appointment Section </h1>
  </div>
  <div class="container">
  <form method="POST" action="?">
    <table border="10" style=" height:300px; width:auto; margin-left: auto;margin-right: auto;">
      <tr>
        <td>Doctor's Name: </td>
        <td>Dr.<?php echo $_COOKIE['doctorname'] ?></td>
      </tr>

      <tr>
        <td>Doctor's Location: </td>
        <td><?php echo $_COOKIE['doctorlocation'] ?></td>
      </tr>
      <tr>
        <td>Doctor's Department: </td>
        <td><?php echo $_COOKIE['doctordepartment'] ?></td>
      </tr>
      <tr>
        <td>
          Doctor's Slot:
        </td>
        <td>
          <?php echo $_COOKIE['doctorslot'] ?>
        </td>
      </tr>
      <tr>
        <td>Your Age: </td>
        <td><input type="number" value="" name="age" placeholder="Your Age"></td>
      </tr>
      <tr>
        <td>Appointment Date: </td>
        <td><input id="datefield" id="datePickerId" type="date" value="" name="app_date" min="2020-09-24" ></td>
      </tr>
     
      <tr>
        <td>Short Description Of Your Problem: </td>
        <td><textarea id="shortdes" name="shortdes" value="" rows="4" cols="50" placeholder="Your Short Description" autocomplete="off"></textarea></td>
        
      </tr>
      <tr>
        <td ><input type="submit" name="subapp" id="submitappointment" value="MAKE APPOINTMENT" style="background-color: #581845 ; color: white; padding: 15px 32px ; margin-left: 10px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" ></td>
        <?php 
          if(isset($_POST['subapp'])){
            //Database //
            $patient_email = $_SESSION['Email'];
            $patient_name = $_SESSION['Name'];
            $doctor_name = $_COOKIE['doctorname'];
            $date = $_POST['app_date'];
            $short_des = $_POST['shortdes'];
            $age = $_POST['age'];
            $slot = $_COOKIE['doctorslot'];
            $doc_email = $_COOKIE['doctoremail'];
            $sql = "INSERT INTO appointmenttable(PatientEmail,DoctorEmail,PatientName,DoctorName, AppointmentDate,ShortDescription,PatientAge, Slot) VALUES('$patient_email','$doc_email','$patient_name','$doctor_name','$date','$short_des','$age','$slot')";
            // echo "Appointment Submitted!";
            if($connection->query($sql)) {
              echo "Appointment Successfully Done !";
              $connection->close();
            }
          }
        ?>

      </tr>
      <tr>
        <td ><input type="submit" name="back_app" value="BACK" style="background-color: #555555; color: white; padding: 15px 32px ; margin-left: 10px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"></td>
          <?php 
            if(isset($_POST['back_app'])){
              header('Location: ./AuthorisedDoctor.php');
            }

          ?>
      </tr>

    </table>
  </form>

  </div>
  
  
</body>
</html>