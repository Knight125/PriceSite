<?php

include '../php/functions.php';

session_start();


if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
       header("location: ../html/index.html");
      exit();
}
$page_user = $_SESSION['username'];
$page_pass = $_SESSION['password'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "pricesite";

  // serve the page normally.

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
  }
  $sql = 'INSERT INTO `todo`(`user_id`, `class`, `description`, `due_date`, `due_hour`, `time_it_takes_est`, `notes`) VALUES (1,"'.$_POST['class'].'","' .$_POST['description'].'","'.$_POST['due_date'].'",'.$_POST['due_hour'].','.$_POST['est'].',"'.$_POST['notes'].'");';
  $conn->query($sql);
   header("location: ../php/data-retrieval.php");

?>