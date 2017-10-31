<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>

<link rel="stylesheet" href="bootstrap/bootstrap.css" />

</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "CALL LoginUser('$username', '$password')";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
                        
                        $row2=mysqli_fetch_array($result);
                        $_SESSION['userType'] = $row2['userType'];
			header("Location: ../default.php"); // Redirect user to index.html
            }else{
                echo('<div><p>Incorrect Username or Password</p></div>');
                //header('Location: login.php');;
				}
    }else{
?>
    
    
     <header>
        <img class="img-responsive" src="images/header.png"/> 
     </header>
    <center>
    <img src="images/login.jpg" alt="Ford" style="width:200px;height:120px;">
    </center>
    
    

<center>
    
   
    
   

    <div class="container">

        
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Welcome
                            <small>Ford Ireland</small>
                        </h1>
                        <ol class="breadcrumb">

                            <li class="active">Login Page</li>
                        </ol>
                    </div>
                </div>
        
    </div>



        <div >
            
            <form action="" method="post" name="login">
                <input type="text" name="username" placeholder="Username" required /> <br><br>
                <input type="password" name="password" placeholder="Password" required /> <br><br>
                <input name="submit" type="submit" value="Login" align="" />
            </form>
        
            <br /><br />
            
        <p><a href='registration.php'>Register</a></p>

        <br /><br />

        </div>
    </center>
<?php } ?>


</body>
</html>
