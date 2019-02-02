<?php 
	require_once('admin/scripts/config.php'); //conects to the php
	if(empty($_POST['username']) || empty($_POST['password'])){
		$message = 'Missing Fields';
	}else{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$message = login($username,$password);
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    
<?php if(!empty($message)):?>
	<p><?php echo $message;?></p>
<?php endif;?>

    <form action="admin_login.php" method="post"> <!-- use post to keep username and pw private-->
         <label for="username">Username:
        <input type="text" name="username" value="" required>
        </label>
        <br>
        <label for="password">Password:
        <input type="password" name="password" value="" required>
        </label>
        <br>
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>