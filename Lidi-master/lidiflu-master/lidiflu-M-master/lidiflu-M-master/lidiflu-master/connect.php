<?php
//Stefan Dalgarno
//Built on 16/12/2016
// Database Connection
$db = "stefandalgarno";
$username = "Stefan";
$tables = "users";
$dbpassword = "password";
$servername = "localhost";

//form data posted
$firstname= $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password= $_POST['password'];
$message= $_POST['message'];

// make connection to database
$conn = new mysqli($servername, $username, $dbpassword, $db);

 if ($conn->connect_error){
	 die("Connection failed: ". $conn->connect_error);
 }
 echo "Connected Successfully";

 $sql = "INSERT INTO stefan (firstname,lastname,email, password,message)VALUE ('$firstname','$lastname','$email','$password','$message')";
 if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>