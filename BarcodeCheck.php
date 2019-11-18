<?php
	header('content-type: text/html; charset=utf-8');
	// 데이터베이스 접속 문자열. (db위치, 유저이름, 비밀번호)
	$host = "localhost";
	$user = "akaishuichi";
	$passwd = "triples501!";
	$db = "akaishuichi";
	$con=new mysqli($host, $user, $passwd, $db);
	mysqli_query($con, 'SET NAMES utf8');
	$statement = mysqli_prepare($con, "select * from barcodeInfo");
	mysqli_stmt_execute($statement);
	
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID, $userBarcode,$userTime);

	$response = array();
	$response['success'] = false;
	while(mysqli_stmt_fetch($statement)) {
		echo $row;
		$response['success'] = True;
		$response['userID_F'] = $userID;
		$response['userBarcode'] = $userBarcode;
		$response['userTime'] = $userTime;
		echo json_encode($response);
		echo "</br>\n";
	}
?>