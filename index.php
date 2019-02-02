<?php require_once('admin/scripts/config.php');
	confirm_logged_in();
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
    <h3>Welcome <?php echo $_SESSION['user_name'];?></h3>
        <p>This is your user page</p>

        <nav>
            <ul>
                <li><a href="#">Create User</a></li>
                <li><a href="#">Edit User</a></li>
                <li><a href="#">Delete User</a></li>
                <li><a href="admin/scripts/caller.php?caller_id=logout">Sign Out</a></li>
            </ul>
        </nav>

</body>
</html>
