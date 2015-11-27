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

$html = <<<EOT
 <!DOCTYPE html>
<head>
  <title>Choose an Option</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
  <div class = "row">
    <div class="wrapper">
      <div class="container">
        <div class = "row">
          <div class="col-sm-12">
            <div class="page-header">
              <h1 class = "header">
                To-Do List <br>
              </h1>

            </div>
          </div>
        </div>
EOT;
$html .= '<table><tr><th>Class</th><th>Description</th></tr>';
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc())
     {

         $html .= "<tr><td>". $row["class"]. "</td><td>". $row["description"]."</td></tr>";
     }
} else {
     $html .= "empty";
}
$html .= '</table><br> <form action="add_item.html"><input type="submit" value = "Add Item To List"></form>';

$html .= <<<EOT
</div>
      <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
  </div>
</div>
</body>
</html>
EOT;
echo $html;
$conn->close();
?>
