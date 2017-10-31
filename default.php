<!DOCTYPE html>
<html>
    <head>
        <title>Ford Ireland</title>
        <script type="text/javascript" src="js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/main.php">
        <script type="text/javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script> 
        
        
   <!--     <script type="text/javascript" src="js/JSmain.js"></script> -->
        
         <script type="text/javascript" src="js/javascript.js"></script>
         <script type="text/javascript" src="js/javascript_User.js"></script>
         
         <script type="text/javascript" src="js/javascript_Van.js"></script>
         
        
    </head>
    <body>
     <?php
	require('api/db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (!isset($_SESSION['username'])){
        header('Location: api/login.php');
        session_destroy();
        exit();
    }
    
    ?>
        
            <header>
                <img class="img-responsive" src="images/header.png"/> </br>
            </header>
        
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
                <li id="t2"><a href="#cars" role="tab" data-toggle="tab" ><span class="glyphicon glyphicon-euro"></span>  Cars For Sale </a></li>
                <li id="t6"><a href="#vans" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-euro"></span>  Vans For Sale </a></li>
                <?php 
                    if($_SESSION['userType'] == 'admin' || $_SESSION['userType'] == 'CarAdmin')
                    {
                        echo('<li id="t5"><a href="#tab5" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>  View Users</a></li>');
                        echo('<li id="t3"><a href="#tab3" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span>  Add new User</a></li>');
                        echo('<li id="t4"><a href="#tab4" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>  Activity Report</a></li>');
                    }
                ?>
                <li style="float: right;"><a class="hover-me" href="api/logout.php"></a></li>
            </ul>
             
            <br>
            
            
            <div class="tab-content">
                            
                
                
                <div class="tab-pane active" id="home">
                    
                    <div class="container">

        
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">About
                                    <small>Ford Ireland</small>
                                </h1>
                                <ol class="breadcrumb">

                                    <li class="active">About</li>
                                </ol>
                            </div>
                        </div>
                <!-- /.row -->

                <!-- Intro Content -->
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/about1.jpg" alt="">
                            </div>
                            <div class="col-md-6">
                                <h2>Ford Company</h2>
                                <p>We pride ourselves as something other than a faceless business selling vehicles. We’re a company made up of people with families who have mortgages, just like you. Come to us looking for the best you can afford, and we will help you buy it and maintain it in every way we can.</p>
                                <p>As an Irish company, it’s important for us to have a set of standards by which we can judge ourselves - and others can judge us too. We call them ‘our vision’, ‘our mission’ and ‘our values’.</p>
                                <p>FordStores offer you a whole new way to shop and experience Ford.
                                                                Relaxed, informal and full of interactive technology, FordStores enable you to explore Ford cars, and choose what’s right for you.</p>
                            </div>
                            <div class="row">

                                <div class="col-lg-12">
                                    <h2 class="page-header">Our Favourite Fords</h2>
                                </div>

                                <div class="col-md-4 text-center">

                                    <div class="thumbnail">
                                        <img class="img-responsive" src="images/mustang.jpg" >
                                        <div class="caption">
                                            <h3>Ford Mustang<br></h3>
                                            <p>Iconic, powerful and dynamic: this is the next generation, new Ford Mustang</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 text-center">
                                    <div class="thumbnail">
                                        <img class="img-responsive" src="images/st.jpg" >
                                        <div class="caption">
                                            <h3>Ford Focus ST<br></h3>

                                            <p>The new Focus ST delivers it all, in one thrilling package</p>

                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-4 text-center">
                                    <div class="thumbnail">
                                        <img class="img-responsive" src="images/gt.jpg">
                                        <div class="caption">
                                            <h3>Ford GT<br>

                                            </h3>
                                            <p>The Ford GT is the culmination of everything great we do at Ford</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> 
                        <hr>
                     </div>                   
                </div>
                
                
                
                <div class="tab-pane" id="cars">
                     <div class="container">
                         
                         
                         
                         <br>
            
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Available Fords
                                    <small>Cars For Sale</small>
                                </h1>
                                <ol class="breadcrumb">
                                    <li class="active">Available Stock</li>
                                </ol>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <img class="img-responsive" src="images/slide1.jpg" alt="">
                            </div>
                        </div>
                         
                        <br><br>
                         
                         
                        <table id="carTable">
                            <thead>
                                <tr>
                                    <th>Reg Number</th>
                                    <th>Model</th>
                                    <th>Transmition</th>
                                    <th>Year</th>
                                    <th>Colour</th>
                                    <th>NCT</th>
                                    <th>Engine Size</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody id="body"></tbody>
                        </table>
                     
                     </div>
                </div>
                
                <br><br>
                
                <div class="tab-pane" id="vans">
                     <div class="container">
                         
                         
                         
                         <br>
            
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Available Fords
                                    <small>Vans For Sale</small>
                                </h1>
                                <ol class="breadcrumb">
                                    <li class="active">Available Stock</li>
                                </ol>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <img class="img-responsive" src="images/slide1.jpg" alt="">
                            </div>
                        </div>
                         
                        <br><br>
                         
                         
                        <table id="vanTable">
                            <thead>
                                <tr>
                                    <th>Reg Number</th>
                                    <th>Model</th>
                                    <th>Transmition</th>
                                    <th>Year</th>
                                    <th>Colour</th>
                                    <th>Engine Size</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody id="vanTableBody"></tbody>
                        </table>
                     
                     </div>
                </div>
                
                <br><br>
                
                
               <div class="tab-pane" id="tab5">
                    <div class="container">
                         
                         
                         
                         <br>
            
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Users
                                    <small>Registered</small>
                                </h1>
                                <ol class="breadcrumb">
                                    <li class="active">View Users</li>
                                </ol>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <img class="img-responsive" src="images/slide1.jpg" alt="">
                            </div>
                        </div>
                         
                        <br><br>
                         
                         
                        <table id="userTable">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>email</th>
                                    <th>Date Registered</th>
                                    <th>User Type</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody id="userTableBody"></tbody>
                        </table>
                     
                        <br><br><br><br>
                        
                     </div>
                </div>
                
                <div class="tab-pane" id="tab3">
                    <center>                    
                    <iframe src="api/registration.php" height="800" width="1000" frameborder="0"></iframe>
                    </center>
                </div>
                <div class="tab-pane" id="tab4">
                    <div class="container">
                        
                        <br>
            
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Activity report 
                                    
                                </h1>
                                <ol class="breadcrumb">
                                    <li class="active">Users Activity</li>
                                </ol>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <img class="img-responsive" src="images/slide1.jpg" alt="">
                            </div>
                        </div>
                         
                        <br><br>
                        
                        
                        <center>
                        <br>
                        </center>
                        <table id="activityDetails">
                            <thead>
                                <th>Action</th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Date</th>
                                <th>User Type</th>
                                <th>Car Reg</th>
                            </thead>
                            <tbody>
                                <?php
                                    require 'api/db.php';
                                    $query = "CALL GetActivityReport";
                                    $res = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
                                    {
                                        echo'<tr>';
                                        foreach ($row as $key=>$value)
                                        {
                                            echo'<td>',$value,'</td>';
                                        }
                                        echo'</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        <br><br>
                    </div>
                </div>
                
            </div>
            
            
            
            
            
            
            
            
            
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
    
                <!-- Modal content-->
                <center>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <h4 class="modal-title">Car Details</h4>
                        </div>
                        <div class="modal-body">
                            <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                    echo('<p>You must be an Admin or a Car admin user to add, update or delete cars in the database</p>');
                                }
                                ?>
                            <img id="carImage" src="" alt="car Image"/><br/>
                            <table id="carDetails">
                                <tr>
                                    <td>Car Id:</td>
                                    <td><input type="text" id="carId" disabled="disabled" /></td>
                                </tr>
                                <tr>
                                    <td>Reg Number:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="text" id="carReg" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="carReg" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Model:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="text" id="carModel" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="carModel" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Transmition:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="text" id="carTransmition" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="carTransmition" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="text" id="carYear" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="carYear" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Colour:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="text" id="carColour" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="carColour" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>NCT:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="text" id="nct" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="nct" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Engine Size:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="text" id="carEngineSize" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="carEngineSize" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="text" id="carPrice" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="carPrice" /></td>');
                                    }
                                    ?>
                                </tr>
                            </table><br><br>
                            <table id="buttonTable">
                                <tr>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'VanAdmin') {
                                        echo('<td><input type="button" value="Save" id="btnSave" class="btn btn-default" data-dismiss="modal" disabled="disabled"/></td>');
                                        echo('<td><input type="button" value="Delete" id="btnDelete" class="btn btn-default" data-dismiss="modal" disabled="disabled"/></td>');
                                        echo('<td><input type="button" value="Clear" id="btnClear" class="btn btn-default" disabled="disabled"/></td>');
                                    } else {
                                        echo('<td><input type="button" value="Save" id="btnSave" class="btn btn-default" data-dismiss="modal" /></td>');
                                        echo('<td><input type="button" value="Delete" id="btnDelete" class="btn btn-default" data-dismiss="modal" /></td>');
                                        echo('<td><input type="button" value="Clear" id="btnClear" class="btn btn-default" /></td>');
                                    }
                                    ?>    
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </center>
                
                
                
                
                </div>
            </div>
            
            
            
            <div class="modal fade" id="myVanModal" role="dialog">
                <div class="modal-dialog">
    
                <!-- Modal content-->
                <center>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <h4 class="modal-title">Van Details</h4>
                        </div>
                        <div class="modal-body">
                            <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                    echo('<p>You must be an Admin or a Van Admin user to add, update or delete vans in the database</p>');
                                }
                                ?>
                            <img id="vanImage" src="" alt="van Image"/><br/>
                            <table id="vanDetails">
                                <tr>
                                    <td>Van Id:</td>
                                    <td><input type="text" id="vanId" disabled="disabled" /></td>
                                </tr>
                                <tr>
                                    <td>Reg Number:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                        echo('<td><input type="text" id="vanReg" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="vanReg" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Model:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                        echo('<td><input type="text" id="vanModel" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="vanModel" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Transmition:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                        echo('<td><input type="text" id="vanTransmition" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="vanTransmition" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                        echo('<td><input type="text" id="vanYear" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="vanYear" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Colour:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                        echo('<td><input type="text" id="vanColour" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="vanColour" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Engine Size:</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                        echo('<td><input type="text" id="vanEngineSize" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="vanEngineSize" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                        echo('<td><input type="text" id="vanPrice" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="vanPrice" /></td>');
                                    }
                                    ?>
                                </tr>
                            </table><br><br>
                            <table id="buttonVanTable">
                                <tr>
                                    <?php if($_SESSION['userType'] == 'basic' || $_SESSION['userType'] == 'CarAdmin') {
                                        echo('<td><input type="button" value="Save" id="btnSaveVan" class="btn btn-default" data-dismiss="modal" disabled="disabled"/></td>');
                                        echo('<td><input type="button" value="Delete" id="btnDeleteVan" class="btn btn-default" data-dismiss="modal" disabled="disabled"/></td>');
                                        echo('<td><input type="button" value="Clear" id="btnClearVan" class="btn btn-default" disabled="disabled"/></td>');
                                    } else {
                                        echo('<td><input type="button" value="Save" id="btnSaveVan" class="btn btn-default" data-dismiss="modal" /></td>');
                                        echo('<td><input type="button" value="Delete" id="btnDeleteVan" class="btn btn-default" data-dismiss="modal" /></td>');
                                        echo('<td><input type="button" value="Clear" id="btnClearVan" class="btn btn-default" /></td>');
                                    }
                                    ?>    
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </center>
                
                
                
                
                </div>
            </div>
            
            
            
            
            
            
            
             <div class="modal fade" id="userModal" role="dialog">
                <div class="modal-dialog">
    
                <!-- Modal content-->
                <center>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            <h4 class="modal-title">User Details</h4>
                        </div>
                        <div class="modal-body">
                            <?php if($_SESSION['userType'] == 'basic') {
                                    echo('<p>You must be an admin to add, update or delete users</p>');
                                }
                                ?>
 <!--id = "carDetails" -->      <table id="userDetails">
                                <tr>
                                    <td>User Id:</td>
                                    <td><input type="text" id="userId" disabled="disabled" /></td>
                                </tr>
                                <tr>
                                    <td>Username:</td>
                                    <?php if($_SESSION['userType'] == 'basic') {
                                        echo('<td><input type="text" id="userName" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="userName" disabled="disabled" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <?php if($_SESSION['userType'] == 'basic') {
                                        echo('<td><input type="text" id="userEmail" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="userEmail" disabled="disabled" /></td>');
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>User Type:</td>
                                    <?php if($_SESSION['userType'] == 'basic') {
                                        echo('<td><input type="text" id="userType" disabled="disabled" /></td>');
                                    }
                                    else {
                                        echo('<td><input type="text" id="userType" disabled="disabled" /></td>');
                                    }
                                    ?>
                                </tr>
                                
                            </table><br><br>
                            <table id="buttonUserTable">
                                <tr>
                                    <?php if($_SESSION['userType'] == 'basic') {
                                        echo('<td><input type="button" value="Delete" id="btnbtnUserSaveDelete" class="btn btn-default" data-dismiss="modal" disabled="disabled"/></td>');                                       
                                    } else {                                       
                                        echo('<td><input type="button" value="Remove" id="btnUserDelete" class="btn btn-default" data-dismiss="modal" /></td>');                                        
                                    }
                                    ?>    
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </center>
                
                
                
                
                </div>
            </div>
  
       
        
        
        
        
    </body>
</html>
