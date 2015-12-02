<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      header("location: ../html/index.html");
      exit();
}
 header("location: ../html/add-item.html");
?>