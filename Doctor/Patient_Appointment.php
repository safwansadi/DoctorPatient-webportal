<?php 
    require_once('../db.php');
    session_start();
    function getAllPatients() {
        $con = dbConnection();
        $email = $_SESSION['Email'];
        $sql = "select * from appointmenttable where DoctorEmail='$email' AND AppointmentDate >= NOW()" ;
        $result = mysqli_query($con, $sql);
        $users = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        };
        return $users;
    }
    $patientapps = getAllPatients();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Section</title>
    <link rel="stylesheet" type="text/css" href="../Assets/Requests.css"/>
</head>
<body>
    <h1>
        Welcome To Appointment Section
    </h1>
    <form method="POST">
        <table border="10" id="request">
            <td>PATIENT'S NAME</td>
            <td>PATIENT'S PROBLEM</td>
            <td>AGE</td>
            <td>APPOINTMENT DATE</td>
            <td>ADVICE</td>
        
        <?php for($i=0; $i != count($patientapps); $i++ ){   ?>
            <tr>
                <td>
                   <?= $patientapps[$i]['PatientName'] ?>
                </td>
                <td>
                    <?= $patientapps[$i]['ShortDescription'] ?>
                </td>
                <td>
                    <?= $patientapps[$i]['PatientAge'] ?>
                </td>
                <td>
                    <?= $patientapps[$i]['AppointmentDate'] ?>
                </td>
                <td>
                    <textarea id="docadvice" name="docadvice" rows="4" cols="50"> </textarea>
                    <input type="submit" name="advicesubmit" style="width:300px; height: 50px; background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" >
                </td>
            </tr>
        <?php 
            if(isset($_POST['advicesubmit'])){
                $update_advice = $_POST['docadvice']; 
                if(!isset($update_advice)){
                    echo "Please Enter an Advice or pre meetup condition";
                } else{
                    $con = dbConnection();
                    $advice = $update_advice;
                    $doc_email = $patientapps[$i]['DoctorEmail'];
                    $pat_email = $patientapps[$i]['PatientEmail'];
                    $pat_problem = $patientapps[$i]['ShortDescription'];
                    $sql = "UPDATE appointmenttable SET Advice='$advice' WHERE PatientEmail= '$pat_email' AND DoctorEmail='$doc_email' AND ShortDescription = '$pat_problem' " ;
                    $result = mysqli_query($con, $sql);
                    if($result) {
                        echo "Pre Meetup condition updated";
                    } else {
                        echo "Please try again later";
                    }
                }
            }
        } ?>
        </table>
        <input type="submit" name="back_btn" value="BACK" style="width:300px; height: 50px; background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" >
    </form>
    <?php
        if(isset($_POST['back_btn'])){
            header('Location:./DoctorHomepage.php');
        }
    ?>
</body>
</html>