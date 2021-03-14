<?php
    require_once('../db.php');
    session_start();

    function getAllDoctorsRequests(){
        $con = dbConnection();
        $email = $_SESSION['Email'];
		$sql = "select * from maindoctable where Email='$email'";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}
    $doctorrequests = getAllDoctorsRequests();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Homepage</title>
    <link rel="stylesheet" type="text/css" href="../Assets/homepage.css" media="screen"/>
</head>
<body>
    <div class="header_div">
    <h1>Welcome 
    <?php 
        if(isset($_SESSION['Name'])){
            echo $_SESSION['Name'];
        }
        ?>
    <h1> Your Email: 
    <?php
        if(isset($_SESSION['Email'])){
            echo $_SESSION['Email']; 
        }
    ?> </h1>
    <p style="text-align: center;"> Now you are logged In and can manipulate your account </p>
    </div>
    <div class="container">
    <form method="POST" action="./DoctorHomepage.php">
        <table border="15">
            <tr> 
                <td>LOCATION</td>
                <td>EDIT LOCATION</td>
                <td>MOBILE</td>
                <td>EDIT MOBILE NO</td>
                <td>PASSWORD</td>
                <td>EDIT PASSWORD</td>
                <td>SET TIME SLOT </td>
            </tr>
            <?php  for($i=0; $i != count($doctorrequests); $i++ ){ ?>
                <tr>
                    <td><?= $doctorrequests[$i]['Location'] ?> </td>
                    <td>
                        <input type="text" value="" name="new_loc" style="height: 40px;">
                        <input type="submit" value="Edit Location" name="edit_loc" style="margin-top: 5px;">
                    </td>
                    <td><?= $doctorrequests[$i]['MobileNo'] ?> </td>
                    <td>
                        <input type="number" value="" name="new_mob" style="height: 40px;">
                        <input type="submit" value="Edit Mobile No" name="edit_mob" style="margin-top: 5px;">
                    </td>
                    <td><?= $doctorrequests[$i]['Password'] ?> </td>
                    <td>
                        <input type="password" value="" name="new_pass" style="height: 40px;">
                        <input type="submit" value="Change Password" name="edit_pass" style="margin-top: 5px;">
                    </td>
                    <td>
                        <input type="text" value="" name="new_slot" style="height: 40px;">
                        <input type="submit" value="Assign Slots" name="edit_slot" style="margin-top: 5px;">
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
                        $sql = "UPDATE maindoctable SET Location='$loc' where Email='$mail'";
                        if($connection->query($sql)) {
                            echo "Location Updated!";
                        }
                    }
                }

                if(isset($_POST['edit_mob'])){
                    $connection = dbConnection();
                    if(!$_POST['new_mob']){
                        echo "Please Provide Your Mobile Phone Number";
                    } else {
                        $mob = $_POST['new_mob'];
                        $mail = $_SESSION['Email'];
                        $sql = "UPDATE maindoctable SET MobileNo='$mob' where Email='$mail'";
                        if($connection->query($sql)) {
                            echo "Mobile Number Updated!";
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
                        $sql = "UPDATE maindoctable SET Password='$pass' where Email='$mail'";
                        if($connection->query($sql)) {
                            echo "Password Updated!";
                        }
                    }
                }

                if(isset($_POST['edit_slot'])){
                    $connection = dbConnection();
                    if(!$_POST['new_slot']){
                        echo "Please Provide A New Slot between 9AM to 5PM";
                    } else {
                        $slot = $_POST['new_slot'];
                        $mail = $_SESSION['Email'];
                        $sql = "UPDATE maindoctable SET Slot='$slot' where Email='$mail'";
                        if($connection->query($sql)) {
                            echo "Slot Updated!";
                        }
                    }
                }
        
            } ?>
            <tr>
                <td colspan="6"><input type="submit" value="Show Today's Appointment" name="doc_appointment" style="width: 350px; height: 70px" </td>
            </tr>

            <tr>
                <td colspan="6"> <input type="submit" value="Logout" name="doc_logout" style="width: 350px; height: 70px"> </td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['doc_logout'])){
            header("Location: ./DoctorFacade.php");
            session_destroy();
        } else if(isset($_POST['doc_appointment'])){
           header('Location: ./Patient_Appointment.php');
        } 
    ?>

    </div>
    
</body>
</html>