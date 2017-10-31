<?php
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>


<link rel="stylesheet" href="../css/main.php" />


</head>
<body>
<?php
	require('db.php');
        session_start();
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
                $userType = ($_REQUEST['user']);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$reg_date = date("Y-m-d H:i:s");
        $query = "CALL AddUser('$username', '$email', '$password', '$reg_date', '$userType')";
        $result = mysqli_query($con,$query);
        if($result){
            if (isset($_SESSION['username'])) {
                echo('<center><div>The new admin has been added to the system.</div><br /><p style="text-color: blue"><a href="registration.php">Click here to add another admin to the system.</a></p></center>');
            }else {
                echo "<div class='form'><h3>Thank you for registering. We are redirecting you to the login page.</h3><br/>Click here to <a href='login.php'>Login</a><script>
                var timer = setTimeout(function() {
                window.location='login.php'
                }, 3000);
                </script></div>";
            }
        }
        else {
            
        }
    }else{
        
    
?>
    
    <header>
        <img class="img-responsive" src="images/header.png"/> 
     </header>
    <div class="form">
        
        
        <center>
            
            <div >
            
            <br>
            
            <img src="images/login.jpg" alt="Ford" style="width:200px;height:120px;">
            
            <h1 class="page-header">Register</h1>
            
            
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="Username" required /><br/><br />
                <p class="tooltip">Type of user: 
                <select name="user">
                    <option value="basic">Regular User</option>
                    <?php 
                    if(isset($_SESSION['userType']) && ($_SESSION['userType'] == 'admin' || $_SESSION['userType'] == 'CarAdmin' || $_SESSION['userType'] == 'VanAdmin' ))
                    {
                            echo('<option value="admin">Admin User</option>');
                            echo('<option value="CarAdmin">Car Admin User</option>');
                            echo('<option value="VanAdmin">Van Admin User</option>');
                    }
                    else {
                            echo('<option value="admin" disabled="disabled">Admin User</option>');
                            echo('<option value="CarAdmin" disabled="disabled">Car Admin User</option>');
                            echo('<option value="VanAdmin" disabled="disabled">Van Admin User</option>');
                        }
                    ?>
                </select> <span class="tooltiptext">Must be loged in as an Admin to register a new Admin</span></p>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="Register" />
            </form>
            
            <br /><br />
            
            
            <?php 
                if(!isset($_SESSION['username']))
                {
                    echo('<a href="login.php">Login Page</a></center>');
                }
            ?>
            
            <br /><br />
            
            </div>
        </center>
    </div>
<?php } ?>
</body>
</html>
