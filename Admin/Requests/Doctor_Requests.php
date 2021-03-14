
<?php
    require_once('../../db.php');

    function getAllDoctorsRequests(){
		$con = dbConnection();
		$sql = "select * from doctorrequest_table";
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
	<title>DOCTOR REQUESTS</title>
	<link rel="stylesheet" type="text/css" href="../../Assets/Requests.css"/>
</head>
<body>
    <h1>Here are the requests of new registered Doctor.</h1>
	<p>You can either Accept or Reject their Requests</p>

	<form method="POST">
		<table border=1 id="request"> 
			<tr> 
				<td>NAME</td>
				<td>ADDRESS</td> 
				<td>EMAIL</td>
				<td>GENDER</td>
				<td>MOBILE_NO</td>
				<td>DEPARTMENT</td>
				<td>LOCATION</td>
				<td>ADDITIONAL FILE</td>
				<td>REQUESTS HANDLER</td>
			</tr>
			<?php for($i=0; $i != count($doctorrequests); $i++ ){ ?>
				
				<tr>
					<td><?= $doctorrequests[$i]['Name'] ?></td>
					<td><?= $doctorrequests[$i]['Address'] ?></td>
					<td><?= $doctorrequests[$i]['Email'] ?></td>
					<td><?= $doctorrequests[$i]['Gender'] ?> </td>
					<td><?= $doctorrequests[$i]['MobileNo'] ?> </td>
					<td><?= $doctorrequests[$i]['Department'] ?> </td>
					<td><?= $doctorrequests[$i]['Location'] ?> </td>
					<td> <?php echo "<img src='../../Doctor/".$doctorrequests[$i]['FileName']."' height='100'> "; 
					?>
					</td>
					
					<td>
						<input type="submit" style="background-color: #4CAF50" value="Accepted" name="doc_acc">
							|
						<input type="submit" style="background-color: #f44336" value="Rejected" name="doc_rej">
					</td>
				</tr>
			</form>
		<?php 
		
		if(isset($_POST['doc_acc'])){
			$connection = dbConnection();
			// eta holo request table theke nisi // 
			$doc_name =  $doctorrequests[$i]['Name'];
			$doc_address = $doctorrequests[$i]['Address'];
			$doc_email = $doctorrequests[$i]['Email'];
			$doc_gender = $doctorrequests[$i]['Gender'];
			$doc_mobile = $doctorrequests[$i]['MobileNo'];
			$doc_department = $doctorrequests[$i]['Department'];
			$doc_location = $doctorrequests[$i]['Location'];
			$doc_password = $doctorrequests[$i]['Password'];
			$sql = "INSERT INTO maindoctable(Name, Address, Gender, MobileNo, Email, Department, Location,Password ) VALUES ('$doc_name','$doc_address','$doc_gender','$doc_mobile','$doc_email','$doc_department','$doc_location','$doc_password')";
			if($connection->query($sql)) {
				echo "Doctor Accepted!";
				echo '<h1> Please Reload The Page to See the Change </h1>';
			$sql2 = "Delete From doctorrequest_table where Email='$doc_email'";
			$connection->query($sql2);
			$connection->close();
			} else {
				echo "Please Try Again";
			} 

		} else if(isset($_POST['doc_rej'])){
			$connection = dbConnection();
			$doc_email = $doctorrequests[$i]['Email'];
			$sql2 = "Delete From doctorrequest_table where Email='$doc_email'";
			$connection->query($sql2);
			echo "<h1>Doctor Request is Rejected... </h1>";
			echo '<h1> Please Reload The Page to See the Change </h1>';
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