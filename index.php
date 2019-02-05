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

<h1>User Dashboard</h1>
    <h2>Hello, <?php echo $_SESSION['user_name'];?></h2> 

    <?php 
    //Start of different messages depending on time of day
        $time = date("H"); //This will set the variable to a 24 hour clock
        if ($time < "12") { //Before 1200 is the morning
            echo "<h2>Good morning!</h2>";
        } elseif ($time >= "12" && $time < "18") { //Between 1200 and 1800 is the afternoon
            echo "<h2>Good afternoon!</h2>";
        } elseif ($time >= "18") { //After 1800 it is night time
            echo "Oh, you're up so late! Good night";
        }
    //End of different messages
    //Start of login time
        $loginTime = ($_COOKIE['user_date']); //sets the cookie for when user is last logged in
        $timeQuery = 'SELECT * FROM tbl_users WHERE user_date = '.$loginTime;

        if(!isset($_COOKIE[$timeQuery])) {
            echo 'You last visited on: '.date('D, M. d, Y \a\t g:ia'); //Formats as Day, Month, day (number), year at hour:minute
        } else {
            //Ideally this would what would show up if they haven't visited the site before?
            // Don't how this would work, will have to do further research
            echo 'Welcome to my site!';
        }
    //End of login time
    ?>

    <nav>
        <ul>
            <li><a href="admin/scripts/caller.php?caller_id=logout">Sign Out</a></li>
        </ul>
    </nav>

</body>
</html>
