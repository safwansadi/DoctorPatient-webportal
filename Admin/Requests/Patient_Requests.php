<?php
    require_once('../../db.php');

    function getAllPatientRequests(){
		$con = dbConnection();
		$sql = "select * from patientrequest_table";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

    $patientrequests = getAllPatientRequests();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Patient REQUESTS</title>
	<link rel="stylesheet" type="text/css" href="../../Assets/Requests.css"/>
</head>
<body>
    <h1>Here are the requests of new registered Patient.</h1>
    <p>You can either Accept or Reject their Requests</p>
	<form method="POST">
		<table border=1 id="request"> 
			<tr> 
				<td>NAME</td>
				<td>EMAIL</td>
				<td>GENDER</td>
				<td>BIRTH DATE</td>
				<td>LOCATION</td>
				<td>PASSWORD</td>
				
			</tr>
			<?php for($i=0; $i != count($patientrequests); $i++ ){ ?>
				
				<tr>
					<td><?=  $patientrequests[$i]['Name'] ?></td>
					<td><?=  $patientrequests[$i]['Email'] ?></td>
                    <td><?=  $patientrequests[$i]['Birth_Date'] ?> </td>
                    <td><?=  $patientrequests[$i]['Gender'] ?> </td>
					<td><?=  $patientrequests[$i]['Location'] ?> </td>
					<td><?=  $patientrequests[$i]['Password'] ?> </td>
					
					<td>
						<input type="submit" style="background-color: #4CAF50" value="Accepted" name="pat_acc">
							|
						<input type="submit" style="background-color: #f44336" value="Rejected" name="pat_rej">
					</td>


					<script>
					
					</script>
				</tr>
			</form>
		<?php 
		
		if(isset($_POST['pat_acc'])){
			$connection = dbConnection();
			$pat_name =   $patientrequests[$i]['Name'];
			$pat_address =  $patientrequests[$i]['Location'];
			$pat_email =  $patientrequests[$i]['Email'];
			$pat_gender =  $patientrequests[$i]['Gender'];
			$pat_birthday =  $patientrequests[$i]['Birth_Date'];
			$pat_password =  $patientrequests[$i]['Password'];
			$sql = "INSERT INTO mainpatienttable(Name, Email,Birth_Date,Gender, Location, Password) VALUES ('$pat_name','$pat_email','$pat_birthday','$pat_gender','$pat_address','$pat_password')";
			if($connection->query($sql)) {
				echo "Patient Accepted!";
			$sql2 = "Delete From patientrequest_table where Email='$pat_email'";
			$connection->query($sql2);
			$connection->close();
			} else {
				echo "Please Try Again";
			} 

		} else if(isset($_POST['pat_rej'])){
			$connection = dbConnection();
			$doc_email =  $patientrequests[$i]['Email'];
			$sql2 = "Delete From patientrequest_table where Email='$pat_email'";
			$connection->query($sql2);
			$connection->close();
		}
	}
		?>
	</table>
	<input type="submit" style="background-color: #555555; color: black;border: none;color: white;padding: 15px 32px; text-align: center;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);width: 100%;" name="btn_back" value="BACK">
	<?php 
		if(isset($_POST['btn_back'])){
			header('Location:../AdminHomepage.php');
		}
	?>
</body>
</html>