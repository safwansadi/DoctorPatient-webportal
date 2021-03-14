<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <link rel="stylesheet" type="text/css" href="../Assets/homepage.css" media="screen"/>
</head>
<body>
    <div class="header_div">

        <h1>Welcome <?php 
            if(isset($_SESSION['Name'])){
                echo $_SESSION['Name'];
            } 
        ?> 
        </h1>   
        <h1>What Do You Want To Do ? <h1> 
    </div>

    <div class="container">
        <form action="?" method="POST">
            <table border="10">
                <tr>
                    <td><input type="submit" name="show_info" value="ADMIN PORTAL"></td>
                </tr>
                
                <tr>
                    <td><input type="submit" name="show_doctor_req" value="DOCTOR REQUESTS"></td>
                </tr>
                
                <tr>
                    <td><input type="submit" name="show_patient_req" value="PATIENT REQUESTS"></td>
                </tr>

                <tr>
                    <td><input type="submit" name="logout" value="LOGOUT"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
        if(isset($_POST['logout'])) {
            header("Location: ./AdminFacade.php");
            session_destroy();

        }

        if(isset($_POST['show_doctor_req'])) {
            header("Location: ./Requests/Doctor_Requests.php");
          

        }

        if(isset($_POST['show_patient_req'])) {
            header("Location: ./Requests/Patient_Requests.php");
      
        }

        if(isset($_POST['show_info'])) {
            header("Location: ./Requests/AdminUser.php");
        }

    ?>

</body>
</html>