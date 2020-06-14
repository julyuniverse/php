<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>join</title>
	</head>
	<body>
		<header>
			<h1>회원가입</h1>
		</header>
		<hr/>

		<form action="process_join.php" method="post">
			<table>
				<tr>
					<td>아이디</td><td><input type="text" name="id"></td>
				</tr>
				<tr>
					<td>비밀번호</td><td><input type="password" name="pw"></td>
				</tr>
				<tr>
					<td>이름</td><td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>이메일</td><td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>레벨</td><td><input type="number" name="level"></td>
				</tr>
				<tr>
					<td>번호</td><td><input type="text" name="tel"></td>
				</tr>
			</table>
			<input type="submit" value="회원가입">
			<button type="button" onclick="location.href='main.php';">메인으로</button>
		</form>
	</body>
</html>
