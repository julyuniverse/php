<?php
	//데이터베이스 연결
	$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");

	$sql = "insert into board(writer, title, description, created, code, category, level)
			values('".$_POST['writer']."', '".$_POST['title']."', '".$_POST['description']."', now(), '".$_POST['code']."', '".$_POST['category']."', ".$_POST['level'].")";

	$result = mysqli_query($conn, $sql);

	if($result === false){
		echo "저장하는 과정에 문제가 생겼습니다.";
		error_log(mysqli_error($conn));
	}else{
		echo "<script>document.location.href='boardList.php';</script>";
	}
?>
