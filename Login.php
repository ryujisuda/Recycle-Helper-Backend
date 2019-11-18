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
	$statement = mysqli_prepare($con, "select * from userInfo where userID = ? and userPassword = ?");
	mysqli_stmt_bind_param($statement, "ss", $userID, $userPW);
	mysqli_stmt_execute($statement);
	
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID, $userPW, $userName, $userPhone);
	$result = array();
	$result['success'] = false;
	while(mysqli_stmt_fetch($statement)){
		$response['success'] = true;
		$response['userID'] = $userID;
		$response['userPassword'] = $userPW;
		$response['userName'] = $userName;
		$response['userPhone'] = $userPhone;
		//echo json_encode($response);
	}
	echo json_encode($response);
?>