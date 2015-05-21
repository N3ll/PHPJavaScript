<?php 

$conn= mysqli_connect('localhost','neli','123','yogies');

if(!$conn){
	exit;
}

$username=$pass=$userExist=$passExist='';

$username= trim($_POST['username']);
$pass= trim($_POST['pass']);
$userExist= trim($_POST['userExist']);
$passExist= trim($_POST['passExist']);

// print_r($username);
// print_r($pass);



if($username!='' && $pass!=''){
	$usernameCheck = mysqli_query($conn, 'SELECT username FROM users WHERE username="'.$username.'"');
	// print_r('SELECT username FROM users WHERE username="'.$username.'"');

	// var_dump($usernameCheck);
	$check=false;

	if($usernameCheck->num_rows == 0){
		$check=true;	
	} else {
		$check=false;
	}

	// var_dump($check);

	if($check == true){
		// print_r('in true');
			
		$userToEnter = mysqli_real_escape_string($conn, $username);
		
		$passToEnter = mysqli_real_escape_string($conn, $pass);

		$sql = 'INSERT INTO users (username,password) VALUES ("'.$userToEnter.'","'.$passToEnter.'")';
		// print_r($sql);

		if(mysqli_query($conn, $sql)){
			session_start();
		// print_r($_SESSION);
			$_SESSION['logged_in']= true;
			// var_dump($username);
			$_SESSION['user'] = $username;	
			// print_r($_SESSION['username']);
			header('Location: http://localhost:8888/Master/home.php');
			exit;
		} 
	} else {
		header('Location: http://localhost:8888/Master/user_exists.php');
		exit;
	}
}

if($userExist!='' && $passExist!=''){
	$existingPass= mysqli_query($conn, 'SELECT password FROM users WHERE username="'.$userExist.'"');
	$existingPass = mysqli_fetch_assoc($existingPass);
	$checkPassExist = $existingPass['password'];
	// var_dump($checkPassExist);
	// var_dump($passExist);

	if($checkPassExist == $passExist) {
		session_start();
		$_SESSION['logged_in']= true;
		$_SESSION['user'] = $userExist;
		// print_r($_SESSION);
		header('Location: http://localhost:8888/Master/home.php');
		exit;
	}else{
		header('Location: http://localhost:8888/Master/user_exists.php');
		exit;
	}
}
else{
	header('Location: http://localhost:8888/Master/user_exists.php');
	exit;
}
?>