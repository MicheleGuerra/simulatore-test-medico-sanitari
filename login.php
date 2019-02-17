<?php
session_start();


$con = mysqli_connect('localhost','root', 'password');
	if($con){
		echo"connection";
	}

	mysqli_select_db($con,'quizdbase');


	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	

/*$q = " select * from quizregistration where user = '$username' && pass='$password' ";

$result = mysqli_query($con,$q);

$row = mysqli_num_rows($result);*/

if($username == 'admin' && $password == 'AdminAdmin' ){
	
header('location:admin.php');	
}else{
	//header('location:index.php');
	$_SESSION['username'] = $username;

	$userquery = " insert into user(username) values ('$username')";
	$userresult = mysqli_query($con,$userquery) ;

	header('location:home.php?page=1');	
}

?>