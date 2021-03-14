<?php 
    require_once('../db.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment History</title>
</head>
<body style="background-color:aqua;">

    <h1 style="text-align:center">Appointment History</h1>
    <form method="POST">
        <table border="10" style=" height:300px; width:auto; margin-left: auto;margin-right: auto;">
            <tr>
                <td>Patient's Name</td>
                <td>Doctor's Name</td>
                <td>Date</td>
                <td>Short Description</td>
                <td>Advice</td>
            </tr>
            <?php 
                $con = dbConnection();
                $patientName = $_SESSION['Name'];
                $sql = "SELECT * from appointmenttable where PatientName='$patientName'";
                //Store info to table 
                $result = mysqli_query($con, $sql);
                $users =[];
                while($row = mysqli_fetch_assoc($result)){
                    array_push($users, $row);
                }; ?>
                <?php for($i=0; $i != count($users); $i++ ){ ?>
                <tr>
                    <td><?= $users[$i]['PatientName'] ?></td>
                    <td><?= $users[$i]['DoctorName'] ?></td>
                    <td><?= $users[$i]['AppointmentDate'] ?> </td>
                    <td><?= $users[$i]['ShortDescription'] ?></td>
                    <td><?= $users[$i]['Advice'] ?></td>
                </tr>
                <?php } ?>
                <tr>
                <td><input type="submit" id="backsubmit" value="Back" name="back_submit" style="background-color: #555555; color: white; padding: 15px 32px ; margin-left: 10px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"></td>
                </tr>
                <?php 
                    if(isset($_POST['back_submit'])){
                        header("Location: ./PatientHomepage.php");
                    }
                ?> 
            </table>
    </form>
    
</body>
</html>