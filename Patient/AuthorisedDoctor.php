
<?php 
    require_once('../db.php'); 
    session_start();
?>

<html>
<head>

 <!-- Ajax Feature For Live Search -->
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="Warning: Please Enter Doctor's Name";
    document.getElementById("livesearch").style.border="0px";
    document.getElementById("livesearch").style.color="#C70039";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        // console.log(this.data);
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.color="black";
    }
  }
  xmlhttp.open("GET","AuthorisedDoctor.php?q="+str,true);
  xmlhttp.send();
}
</script>
<link rel="stylesheet" type="text/css" href="../Assets/AuthorisedDoctorList.css" media="screen"/>
</head>

<!-- HTML for search bar  -->
<title>Authorised Doctor</title>
<body>

<form method="GET">
<div class="topnav">
  <input type="search" placeholder="Search Using Doctor's Name/Location" size="50" id="searchdoc" onkeyup="showResult(this.value)">

  <div id="livesearch"></div>
  </form>

  </body>
  </html>
  <input type="submit" name="back_btn" value="Back To Main Activities" style="background-color: #555555; color: white; padding: 15px 32px ; margin-left: 10px; text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">
  <?php 
    if(isset($_GET['back_btn'])){
      header('Location: ./PatientHomepage.php');
    }
  ?>
</div>


<!--  Backend -->
<?php 
    $con = dbConnection();
    if(!empty($_GET['q'])) {
        $q = $_GET['q']; 
        $query = "SELECT * from maindoctable where Name like '%$q%' OR Location like '%$q%' OR Department like '%$q%'";
        $result = mysqli_query($con, $query);
        $user = [];
        while($output = mysqli_fetch_assoc($result)) {
            echo  '<h2> Name:  '.$output['Name'].'</h2>';
            echo '<h2> Department:  '.$output['Department']. '</h2> ';
            echo '<h2> Location:  '.$output['Location']. '</h2>'; 
            ?>
            <div class="appointbtn">
            <form method="POST" action="./Appointment.php">
                <input type="submit" value="Make Appointment" name="appsubmit" id="submitbtn">
            <div>
            <hr>
            <br>
            <?php
            
            // echo "OK";
            $time = time();
            $patient_name = $_SESSION['Name'];
            $cookie_doc_name = $output['Name'];
            $cookie_doc_loc = $output['Location'];
            $cookie_doc_dep = $output['Department'];
            $cookie_doc_slot = $output['Slot'];
            $cookie_doc_email = $output['Email'];
            setcookie('doctorname',$cookie_doc_name, $time+3600);
            setcookie('doctoremail',$cookie_doc_email, $time+3600);
            setcookie('doctorlocation',$cookie_doc_loc, $time+3600);
            setcookie('doctordepartment',$cookie_doc_dep,$time+3600);
            setcookie('doctorslot', $cookie_doc_slot, $time+3600);
            // header('Location:./Appointment.php'); 
            
            ?>
            </form>
            <?php    
        }
        return $user;
    }
?>


