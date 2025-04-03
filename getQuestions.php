<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unitylogin";

//$questionID = $_POST["questionID"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM questions" /*'" . $questionID . "'"*/;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $rows = array();
  while($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
  
 //after the whole array is created
  echo json_encode($rows);
} else {
  echo "0 results";
}
$conn->close();
?>