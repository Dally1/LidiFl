<?php
   include('db.php');
   // Start the session
   session_start();

   // Set the session varaibles
   $user_check = $_SESSION['login_user'];

   // Make a connection to the database
   $conn =  mysqli_connect($servername, $username, $dbpassword, $db );

   $result = mysqli_query($conn,"select FirstName from stefan where FirstName = '$user_check'");
     if (!$result) {
	   echo 'Could not run query: ' . mysql_error();
        exit;
         }

      $row = mysqli_fetch_array($result);

        $login_session = $row['FirstName'];


   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>