<?php
include 'functions.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pricesite";

session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      header("location: ../html/index.html");
      exit();
}

$page_user = $_SESSION['username'];
$page_pass = $_SESSION['password'];
// serve the page normally.

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM `todo` WHERE `user_id` = (SELECT `id` FROM `users` WHERE `username` = "'.$page_user.'" AND `password` = "'.$page_pass.'");';
$result = $conn->query($sql);

$html = <<<EOT
 <!DOCTYPE html>
<head>
  <title>Choose an Option</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">
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
        <div id="Monday"></div>
        <div id="Tuesday"></div>
        <div id="Wednesday"></div>
        <div id="Thursday"></div>
        <div id="Friday"></div>
        <div id="Saturday"></div>

EOT;
$html .= '<a href = "../php/logout.php">logout</a><br><table><tr><th>Class</th><th>Description</th><th>Due Date</th></tr>';
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc())
     {

         $html .= "<tr><td>". $row["class"]. "</td><td>". $row["description"]."</td><td>". $row["due_date"]."</td></tr>";
     }
} else {
     $html .= "empty";
}
$html .= '</table><br> <form action="../html/add-item.html"><input type="submit" value = "Add Item To List"></form><br><a href = "navigation.html">Navigation</a>';

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
