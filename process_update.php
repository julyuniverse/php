<?php
	//데이터베이스 연결
	$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");

	//밸류값 얻어오기
	$bno = $_POST['bno'];
	$writer = $_POST['writer'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$creted = $_POST['created'];
	$code = $_POST['code'];
	$category = $_POST['category'];
	$level = $_POST['level'];

	$sql = "update board set title = '$title', description = '$description', code = '$code', category = '$category', level = $level
			where bno = $bno";

	echo $sql;
	$result = mysqli_query($conn, $sql);

	if($result === false){
		echo "수정하는 동안 문제가 생겼습니다.";
		error_log(mysqli_error($conn));
	}else{
		echo "<script>document.location.href='boardRead.php?bno=$bno';</script>";
	}
?>
