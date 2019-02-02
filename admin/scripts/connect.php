<?php 
$db_dsn = array(
	'host'=>'localhost',
	'dbname'=>'baile_j_3014_r1',
	'charset'=>'utf8'
);

$dsn = 'mysql:'.http_build_query($db_dsn, '', ';');

//DB Credentials
$db_user = 'root';
$db_pass = 'root'; //leave blank if not mac

try{
	$pdo = new PDO($dsn, $db_user, $db_pass);
}catch(PDOException $exception){
	echo 'Connection Error:'.$exception->getMessage();
	exit();
}