<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Facade</title>
    <link rel="stylesheet" type="text/css" href="../Assets/Facade.css" media="screen"/>
</head>
<body>
    <div class="login-box">
        <div class="container">
        <h2 style="color:#85929E">HELLO PATIENT</h2>
        <form action="?" method="POST">
                <div class="user-box1">
                    <input type="email" name="uemail" required placeholder="Your Email" style="font-size:16pt;">
                    <br>
                    <br>
                    <input type="password" name="upassword" required placeholder="Your Password" style="font-size:16pt;">
                </div>
                
                <div class="container_2">
                    <input type="submit" value="Login" name="patient_login">
                    <a href="../Login_Info.php" class="back_login_Submit">Back To Login Info Page</a>
                    <a href="./PAtientRegister.php" class="patient_register">Register</a>
                </div>
                
                <?php 
                    if(isset($_POST['patient_login'])){
                        $connection = mysqli_connect('127.0.0.1', 'root', '', 'docpatportal');
                            $result = mysqli_query($connection, 'select * from mainpatienttable');
                                $flag=0;
                                while($data = mysqli_fetch_assoc($result)) {
                                    
                                    if($data['Email'] === $_POST['uemail'] && $data['Password'] === $_POST['upassword']) {
                                        $_SESSION['Email']=$data['Email'];
                                        $_SESSION['Name']=$data['Name'];
                                        $_SESSION['Location'] = $data['Location'];
                                        header("Location: PatientHomepage.php");
                                        $flag=1;
                                        break;
                                    }
                                }
                                if($flag==0) {
                                    echo "Try again with correct password and id ";
                                }
                    } 
                ?>
        </form>
        </div>
        
    </div>
</body>
</html>