<?php
	//세션 연결
	session_start();

	//데이터베이스 연결
	$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");

	//밸류값 얻어오기
	$id = $_POST['id'];
	$pw = $_POST['pw'];

	$sql = " select count(*) cnt, mno, id, pw, name, email, joindate, level, tel from member where id = '$id' and pw = '$pw' group by mno";

	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result);

	echo $row['mno'];

	if($row['cnt'] === '1'){
		echo "<script>document.location.href='main.php';</script>";
		$_SESSION['mno'] = $row['mno'];
		$_SESSION['id'] = $row['id'];
	}else{
		echo "로그인하는 동안 문제가 생겼습니다.";
		error_log(mysqli_error($conn));
	}
?>
