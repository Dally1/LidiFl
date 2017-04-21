<?php
include("db.php");

//Start the session
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {

	// Make a connection to the database
 $conn = new mysqli($servername, $username, $dbpassword, $db );

 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

       // username and password from the form
	   $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
       $mypassword = mysqli_real_escape_string($conn,$_POST['psw']);


      $sql = "SELECT ID FROM stefan WHERE firstname = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);


	    // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
		 $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }

	   $conn->close();
   }
?>
<!DOCTYPE html>
<html id="html">
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Want to buy green energy? Come visit our site to find out more!">
    <meta name="keywords"
          content="Green, Energy, Wind, Clean, Buy, Renewable, Turbine, Windmill, Solar, Earth, Caring, Planet">
    <link href="https://fonts.googleapis.com/css?family=Aclonica" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="normalize.css" type="text/css" rel="stylesheet">
    <link href="skeleton.css" type="text/css" rel="stylesheet">
    <link href="lidiflu.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aclonica" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
</head>
<body>
<!-- .container is main centered wrapper -->
<div class="container">

    <a href="index.html"> <img src="Images/logo.png" alt="logo"></a>


    <div id="login">
        <form>
            <h1>Sign In</h1>
            <input type="text" placeholder="Username">
            <input type="password" placeholder="Password">
            <button>Sign in</button>

        </form>
    </div>


    <nav>
        <div class="row"> <!-- Headers -->
            <ul style="list-style-type:none">
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="orders.html">Orders</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="products.html">Products</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div> <!-- End of row div -->
    </nav>
    <div class="body text"> <!-- Main body text-->
       <div class="container"> <!-- This is the form -->
           <label><b>Username</b></label>
           <input type="text" placeholder="Enter Username" name="uname" required>

           <label><b>Password</b></label>
           <input type="password" placeholder="Enter Password" name="psw" required>

           <button type="submit">Login</button>
           <input type="checkbox" checked="checked"> Remember me
         </div>

         <div class="container" style="background-color:#f1f1f1">
           <button type="button" class="cancelbtn">Cancel</button>
           <span class="psw">Forgot <a href="password.php">password?</a></span>
         </div>
       </form>
    </div> <!-- End of body text div -->


    <footer> <!-- Sign in Section -->
        <ul style="list-style-type:none">
            <li>
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="login.html"
                                                           class="btn btn-sm animated-button thar-one">Sign up</a></div>
            </li>
            <li>
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="login.html"
                                                           class="btn btn-sm animated-button thar-two">Login</a></div>
            </li>
            <li>
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="register.html"
                                                           class="btn btn-sm animated-button thar-three">Register</a>
                </div>
            </li>
            <li>
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="about.html"
                                                           class="btn btn-sm animated-button thar-four">Learn more</a>
                </div>
            </li>
        </ul>
    </footer> <!-- End of Footer div -->
</div> <!-- End of container div -->
</body>
</html>