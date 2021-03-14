<?php
    require_once('../../db.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" type="text/css" href="../../Assets/Portal.css" media="screen"/>
</head>
<body>
    <div class="header_div">
        <h1>Welcome To Your Portal <?php 
            
        ?></h1>
    </div>
    <div class="container">
        <form action="?" method="POST">
            <table border="1">
                <tr>
                    <td>
                        <h1>Change Your Name ?</h1>
                    </td>
                    <td>
                        <input type="text" name="uname" value="">
                        <input type="submit" name="namesubmit" value="SUBMIT">
                    </td>
                </tr>

                <tr>
                    <td>
                        <h1>Change Your Password ?</h1>
                    </td>
                    <td>
                        <input type="password" name="upassword" value="">
                        <input type="submit" name="passwordsubmit" value="SUBMIT">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1>Want To Go Back ?</h1>
                    </td>
                    <td>
                        <input type="submit" name="uback" value="BACK">
                    </td>
                </tr>
            </table>
            <br>
        
        </form>

    </div>
    
    
</body>
</html>

<?php
    if(isset($_POST['namesubmit'])){
        $con = dbConnection();
        $session_email = $_SESSION['Email']; 
        $user_name = $_POST['uname'];

        $sql = "UPDATE admin_table SET Name='{$user_name}' where Email='{$session_email}'";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "Name Is Successfully Modified";
        } else {
            echo "Please Try Again Later!";
        }
    }
    if(isset($_POST['passwordsubmit'])){
        $con = dbConnection();
        $session_email = $_SESSION['Email'];
        $user_password = $_POST['upassword'];
        
        $sql = "UPDATE admin_table SET Password='{$user_password}' where Email='{$session_email}'";
        $result = mysqli_query($con, $sql);
        if($result) {
            echo "Password is Successfully Modified";
        }
    }

    if(isset($_POST['uback'])){
        header('Location: ../AdminHomepage.php');
    }
?>