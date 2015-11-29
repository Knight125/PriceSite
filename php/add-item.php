<?php

include '../php/functions.php';

session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      // redirect to your login page
      exit();
}
$page_user = $_SESSION['username'];
$page_pass = $_SESSION['password'];
if (isset($_POST['action'])) {
    insert($_POST['action']);
}

insert($values)
{
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
  $sql = 'INSERT INTO `todo`(`user_id`, `class`, `description`, `due_date`, `due_hour`, `time_it_takes_est`, `notes`) VALUES (1,'.$_POST[`class`].',' .$_POST[`description`].','.$_POST[`due_date`].','.$_POST[`time_it_takes_est`].','.$_POST[`notes`].');';
  $conn->query($sql);

}



?>