<?php
	//데이터베이스 연결
	$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");
	
	//밸류값 얻어오기
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$level = $_POST['level'];
	$tel = $_POST['tel'];

	$sql = "insert into member(id, pw, name, email, level, tel, joindate)
			values('$id', '$pw', '$name', '$email', $level, '$tel', now())";

	$result = mysqli_query($conn, $sql);

	if($result === false){
		echo "가입하는 동안 문제가 생겼습니다.";
		error_log(mysqli_error($conn));
	}else{
		echo "<script>document.location.href='main.php';</script>";
	}
?>
