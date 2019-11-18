<?php
	header('content-type: text/html; charset=utf-8');
	// 데이터베이스 접속 문자열. (db위치, 유저이름, 비밀번호)
	$host = "localhost";
	$user = "akaishuichi";
	$passwd = "triples501!";
	$db = "akaishuichi";
	$con=new mysqli($host, $user, $passwd, $db);
	mysqli_query($con, 'SET NAMES utf8');
	$userID = $_POST["userID"];
	$userPW = $_POST["userPassword"];
	$userName = $_POST['userName'];
	$userPhone = $_POST['userPhone'];
	$statement = mysqli_prepare($con, "insert into userInfo values (?,?,?,?)");
	mysqli_stmt_bind_param($statement, "ssss", $userID, $userPW, $userName, $userPhone);
	mysqli_stmt_execute($statement);
	
	$response = array();
	$response['success'] = True;
	echo json_encode($response);
?>
