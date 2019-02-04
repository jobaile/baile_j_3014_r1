<?php 

function login($username, $password){
	require_once('connect.php');
	//Check if username exists

	$check_exist_query = 'SELECT COUNT(*) FROM tbl_user';
	$check_exist_query .= ' WHERE user_name = :username';

	//echo $check_exist_query;
	
	$user_set = $pdo->prepare($check_exist_query);
	$user_set->execute(
		array(
			':username'=>$username
			//this will make sure that there's a username that exists so you can't hack
		)
	);


	if($user_set->fetchColumn()>0){
		//echo "User Exists!";
		//TODO: Fill the following line with the proper SQL query
		// so that it can get all rows where user_name = $username
		// and user_pass = $password
		$get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username';
		$get_user_query .= ' AND user_pass = :password';

		$get_user_set = $pdo->prepare($get_user_query);

		//TODO: don't forget to bind the placebolders in here
		$get_user_set->execute(
			array(
				':username'=> $username,
				':password'=> $password
			)	
		);

		while($found_user = $get_user_set->fetch(PDO::FETCH_ASSOC)){
			$id = $found_user['user_id'];
			$_SESSION ['user_id'] = $id;
			$_SESSION ['user_name'] = $found_user['user_name'];
			//echo 'USER ID: '.$id.' Logged in!';
		} 

		if(empty($id)){
			$message = 'Login Failed!';
			return $message;
		}

		redirect_to('index.php');
	}else{
		$message = 'Login Failed!';
		return $message;
	}
}


 
