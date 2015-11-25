<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pricesite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM `todo` WHERE `user_id` = (SELECT `id` FROM `users` WHERE `username` = "Kara" AND `password` = "Knight");';
$result = $conn->query($sql);
$html = '<tr><th></th><tr>'
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> class: ". $row["class"]. " - Description: ". $row["description"]."<br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>
