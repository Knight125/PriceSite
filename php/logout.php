<?php
        session_start();
        session_unset($_SESSION['username']);
        session_unset($_SESSION['password']);
        session_destroy();

        header("location: ../html/index.html");
?>