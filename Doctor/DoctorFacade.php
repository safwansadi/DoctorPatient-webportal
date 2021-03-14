<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/Facade.css" media="screen"/>
    <title>Doctor Facade</title>
</head>
<body>
    <div class="login-box">
        <div class="container">
        <h2 style="color:#85929E">HELLO DOCTOR</h2>
        <form action="?" method="POST">
                <div class="user-box1">
                    <input type="email" name="uemail" required style="font-size:16pt;">
                    <br>
                    <br>
                    <input type="password" name="upassword" required style="font-size:16pt;">
                </div>
                <div class="container_2">
                    <input type="submit" value="LOGIN" name="doc_login">
                    <hr>
                    <a href="../Login_Info.php" class="back_login_Submit">Back</a>
                    <hr>
                    <a href="./DoctorRegister.php" class="doctor_register">Register</a>
                </div>
                
                <?php 
                    if(isset($_POST['doc_login'])){
                        $connection = mysqli_connect('127.0.0.1', 'root', '', 'docpatportal');
                            $result = mysqli_query($connection, 'select * from maindoctable');
                                $flag=0;
                                while($data = mysqli_fetch_assoc($result)) {
                                    
                                    if($data['Email'] === $_POST['uemail'] && $data['Password'] === $_POST['upassword']) {
                            
                                        $_SESSION['Name'] = $data['Name'];
                                        $_SESSION['Email'] = $data['Email'];
                                        $_SESSION['Location'] = $data['Location'];
                                        $_SESSION['Gender'] = $data['Gender'];
                                        
                                        // echo $_SESSION['Name'];
                                        // echo $_SESSION['Email'];

                                        header("Location: ./DoctorHomepage.php");
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