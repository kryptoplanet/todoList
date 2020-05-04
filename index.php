<!DOCTYPE html>
<html>
<head>

<title>To do list
</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
include "connection.php"
?>


<?php

    if(isset($_POST['but_submit']))
    {

        $uname=mysqli_real_escape_string($con,$_POST['user_name']);
        $password=mysqli_real_escape_string($con,$_POST['user_pass']);
        
        if($uname !="" && $password !="" )
        {

            $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_array($result);
    
            $count = $row['cntUser'];
    
            if($count > 0){
                $_SESSION['uname'] = $uname;
                header('Location: home.php');
            }else{
                echo "Invalid username and password";
            }
    
        }


        }
?>

<div style="padding:20px 20px;"> 
            <img src="images/logo.jpg" alt="logo" width="100px" height="100px">
            <span class="Heading" style="padding-left:400px;"> <b> To do List </b> </span>
            
        </div>
           
            </br>


<div class="container">
    <form method="post" action="">
            <tr >
                <td style="color:white;background-color:blue;" >Enter your Details</td>
            </tr>
</br></br>
            <tr>
                <td> <input type="text" value="username" id="user_name" name="user_name"> </td>
            </tr>
</br></br>
            <tr>    
                <td> <input type="password" value="password" id="user_pass" name="user_pass"> </td>
            </tr>
    </br></br>
            <tr>
                <td> <input type="submit" value="submit" id="but_submit" name="but_submit"> </td>

            </tr>

    </form>

</div>
</br>
<div>
<b>
Didn't have a account? Click <a href="SignUp.php">Here</a> to create an account
</b>

</div>
</body>
</html>