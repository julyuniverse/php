<?php
	//데이터베이스 연결
	$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");

	//세션 연결
	session_start();
	
	//세션 회원번호
	if(isset($_SESSION['mno'])){
		$mb_login = true;
	}
	
?>
<!doctype html>
<html>
	<head>
		<meta charset="uft-8">
		<title>main</title>
	</head>
	<body>
		<header>
			<h1>메인</h1>
		<header>
		<hr/>

		<form action="process_login.php" method="post">
			<table>
				<tr>
					<td>아이디</td><td><input type="text" name="id"></td>
				</tr>
				<tr>
					<td>비밀번호</td><td><input type="password" name="pw"></td>
				</tr>
			</table>
			<input type="submit" value="로그인">
			<button type="button" onclick="location.href='join.php';">회원가입</button>
		</form>

		<?php 
			if($mb_login){
		?>
			<h3>로그인 되셨습니다.</h3>
		<?php
			}
		?>
	</body>
</html>
