<?php
 // username and password from the form
    $visitorname = mysqli_real_escape_string($conn,$_POST['c-firstname']);
     $visitoremail = mysqli_real_escape_string($conn,$_POST['c-email']);
	 $visitormessage = mysqli_real_escape_string($conn,$_POST['c-message']);
	$to ="contact@stefandalgarno.com";
// send email
mail("contact@stefandalgarno.com",$visitorname,$visitormessage);

header("location:thank.html");
?>