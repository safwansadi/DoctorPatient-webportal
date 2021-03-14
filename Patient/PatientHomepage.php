<?php 
  session_start();
  require_once('../db.php');
 
  function getAllPatientRequests(){
    $con = dbConnection();
    $email = $_SESSION['Email'];
    $sql = "select * from mainpatienttable where Email= '$email'";
    $result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
  }
  $patientrequests = getAllPatientRequests();
?>

<html>
<head>
  <title>Patient Homepage</title>
  <link rel="stylesheet" type="text/css" href="../Assets/homepage.css" media="screen"/>
</head>
<body style="background-color: #2FCED9;">
  <div class="header_div">  
    <h1>Patient Homepage</h1>
    <h1>Hello <?php 
      if(isset($_SESSION['Name'])){
        echo $_SESSION['Name'];

    }
    ?>
  </h1>
  </div>
  <div class="container">
    <form method="POST" action="./PatientHomepage.php">
    <table border="15">
      <tr>
        <td>NAME</td>
        <td>BIRTH DATE</td>
        <td>GENDER</td>
        <td>LOCATION</td>
        <td>EDIT LOCATION </td>
        <td>PASSWORD</td>
        <td>EDIT PASSWORD </td>
      </tr>
      <?php  for($i=0; $i != count($patientrequests); $i++ ){ ?>
        <tr>
          <td><?= $patientrequests[$i]['Name'] ?> </td>
          <td><?= $patientrequests[$i]['Birth_Date'] ?> </td>
          <td><?= $patientrequests[$i]['Gender'] ?> </td>
          <td><?= $patientrequests[$i]['Location'] ?> </td>
          <td>
            <input type="text" value="" name="new_loc" autocomplete="off">
            <input type="submit" style="height: 30px; margin-top: 15px;" value="Edit Location" name="edit_loc" >
          </td>

          <td><?= $patientrequests[$i]['Password'] ?> </td>
          <td>
            <input type="password" value="" name="new_pass">
            <input type="submit" style="height: 30px; margin-top: 15px;" value="Change Password" name="edit_pass">
          </td>
        </tr>
        <?php 
          if(isset($_POST['edit_loc'])){
            $connection = dbConnection();
            if(!$_POST['new_loc']){
                echo "Please Provide Your Location";
            } else {
                $loc = $_POST['new_loc'];
                $mail = $_SESSION['Email'];
                $sql = "UPDATE mainpatienttable SET Location='$loc' where Email='$mail'";
                if($connection->query($sql)) {
                    echo "Location Updated!";
                }
            }
          }

          if(isset($_POST['edit_pass'])){
            $connection = dbConnection();
            if(!$_POST['new_pass']){
                echo "Please Provide A New Password";
            } else {
                $pass = $_POST['new_pass'];
                $mail = $_SESSION['Email'];
                $sql = "UPDATE mainpatienttable SET Password='$pass' where Email='$mail'";
                if($connection->query($sql)) {
                    echo "Password Updated!";
                }
            }
        }
      }?>
    </table>

    <h1>Activities</h1>

      <table border="10">
        <tr>
          <td>
            <input type="submit" value="SEE AUTHORISED DOCTOR LIST" style="height: 30px;width: 250px;" name="doc_list">
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="YOUR APPOINTMENT HISTORY" style="height: 30px;width: 250px;" name="pat_appointment">
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="SEE ALL DOCTORS" style="height: 30px;width: 250px;" name="doc_show">
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="LOGOUT" style="height: 30px;width: 250px;" name="pat_logout">
          </td>
        </tr>  
        </tr>
      </table>
    </form>

    <?php
      if(isset($_POST['pat_logout'])){
          header("Location: ./PatientFacade.php");
          session_destroy();
      }
      else if(isset($_POST['doc_list'])){
        header('Location:./AuthorisedDoctor.php');
      }
      else if(isset($_POST['doc_show'])){
        header('Location: ./showDoctors.php');
      }
      else if(isset($_POST['pat_appointment'])){
        header('Location:./AppointmentHistory.php');
      }
    ?>
  </div>
</body>
</html>