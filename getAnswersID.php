<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unitylogin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT answerID FROM answers";

$result = $conn->query($sql);
//Check if there are any rows returned
if ($result->num_rows > 0) {
  // output data of each row
  $rows = array();
   // Loop through each row
  while($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
  // Return the JSON array
  header('Content-Type: application/json');
  echo json_encode($rows);
  ob_clean ();
} else {
  echo "0 results";
}
$conn->close();
?>