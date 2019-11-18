<?php
	header('content-type: text/html; charset=utf-8');
	// 데이터베이스 접속 문자열. (db위치, 유저이름, 비밀번호)
	$host = "localhost";
	$user = "akaishuichi";
	$passwd = "triples501!";
	$db = "akaishuichi";
	$con=new mysqli($host, $user, $passwd, $db);
	mysqli_query($con, 'SET NAMES utf8');
	$statement = mysqli_query($con, "select * from barcodeInfo");
	$response = array();
	while($row=mysqli_fetch_array($statement)) {
		array_push($response,array("userID"=>$row[0],"userBarcode"=>$row[1],"userTime"=>$row[2]));
	}
	echo json_encode(array("response"=>$response));
	mysqli_close($con);
?>