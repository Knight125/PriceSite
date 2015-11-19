   <?php
    $con=mysqli_connect("127.0.0.1", "root", "", "pricesite");
    if (mysqli_connect_errno($con))
    {
        echo "MySql Error: " . mysqli_connect_error();
        }

    $query = mysqli_query($con,"SELECT * FROM users WHERE username='$_POST[username]' && password='$_POST[password]'");
    $count = mysqli_num_rows($query);
    $row=mysqli_fetch_array($query);

    if ($count==1)
    {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header("location: test.html");
    }
    else
    {
        echo "Invalid username or password";
    }

    mysqli_close($con);
    ?>