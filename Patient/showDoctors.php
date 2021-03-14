<?php
    require_once('../db.php');
    session_start();

    function getAllDoctors(){
        $con = dbConnection();
		$sql = "select * from maindoctable";
		$result = mysqli_query($con, $sql);
		$users1 =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users1, $row);
		};
		return $users1;
	}
    $doctors = getAllDoctors();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's List</title>
    <link rel="stylesheet" type="text/css" href="../Assets/Requests.css" media="screen"/>
</head>
<body style="background-color:aquamarine"> 
        <h1>All Doctor's List </h1>
        <table border="10" id="request" >
            <tr>
                <td>DOCTOR'S NAME</td> 
                <td>DOCTOR'S LOCATION</td> 
                <td>DOCTOR'S DEPARTMENT</td> 
                <td>SLOT</td>
            </tr>
            <?php for($i=0; $i != count($doctors); ++$i ){ ?>
            <tr>
                <td>
                    <?= $doctors[$i]['Name'] ?>
                </td>
                <td>
                    <?= $doctors[$i]['Location'] ?>
                </td>
                <td>
                    <?= $doctors[$i]['Department'] ?>
                </td>
                <td>
                    <?= $doctors[$i]['Slot'] ?>
                <td>
                
            </tr>
            <?php }
            ?>
        </table>
        <form method="POST" action="./PatientHomepage.php">

        <input type="submit" name="back" value="BACK" style="background-color: #555555; color: white; padding: 15px 32px ; margin: 10px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
        </form>
        </table>
        <form method="POST" action="./AuthorisedDoctor.php">
            <input type="submit" name="search" value="SEARCH DOCTOR'S TO MAKE AN APPOINTMENT" style="background-color: #555555; color: white; padding: 15px 32px ; margin: 10px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
        </form>

</body>
</html>