<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unitylogin";

//variables submitted by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM users WHERE username = '" . $loginUser . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // login validation
  while($row = $result->fetch_assoc()) {
   if ($row["password"] == $loginPass)
   {
    echo "Login Success";
   }
   else 
   {
    echo "Invalid login details";
   }
  }
} else {
  echo "Username doesn't exist";
}
$conn->close();
?>