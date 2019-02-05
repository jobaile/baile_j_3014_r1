<?php 
    require_once('admin/scripts/config.php'); //conects to the php
    session_start(); //starts the session for the failed login attempts
    
	if(empty($_POST['username']) || empty($_POST['password'])){
		$message = 'Missing Fields';
	}else{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$message = login($username,$password);
    }
    
    //Failed login attempts
    if(!empty($password)){ //if the password is not correct or empty, it will count as a failed login
        if (isset($_SESSION['loginAttempts'])){
           $_SESSION['loginAttempts']++; //this adds the number of logins
           if ($_SESSION['loginAttempts'] > 2){
             echo 'You have exceeded the amount of login attempts! Please try again later.';
             ?> 
             <!--Uses the CSS property to hide the login form-->        
             <style>
                #login{display:none;}
             </style>
            <!--Uses the CSS property to hide the login form-->        
                <?php 
           } 
        } else {
            $_SESSION['loginAttempts'] = 1; //Shows a message on the first attempt
            echo 'Please make sure to fill in the correct information!';
        }  
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

    <form id="login"action="admin_login.php" method="post"> <!-- use post to keep username and pw private-->
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