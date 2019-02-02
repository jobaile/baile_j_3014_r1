<?php 
    require_once('admin/scripts/config.php');
    confirm_logged_in();
    setcookie($cookie_query, time()); //I read that this needs to be before html
    date_default_timezone_set("America/Toronto"); //This sets the timezone to EST (America/Toronto)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>
<body>

<h1>Dashboard</h1>
    <h2>Hello, <?php echo $_SESSION['user_name'];?></h2> 

<!--Shows login time-->
    <?php
        $loginTime = ($_COOKIE['user_date']);
        $timeQuery = 'SELECT * FROM tbl_users WHERE user_date = '.$loginTime;

        if(!isset($_COOKIE[$timeQuery])) {
            echo '<h3>Welcome back!</h3>
            You last visited on: '.date("D, M. d, y H:i");
        } else {
            echo 'Welcome to my site';
        }
    ?>
<!--Show login time end-->

    <nav>
        <ul>
            <li><a href="admin/scripts/caller.php?caller_id=logout">Sign Out</a></li>
        </ul>
    </nav>

</body>
</html>
