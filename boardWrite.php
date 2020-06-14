<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>boardWrite</title>
	</head>

	<body>
		<header>
			<h1>글 쓰기</h1>
		</header>
		<hr/>

		<form action="process_write.php" method="post">
			<table>
				<tr>
					<td>작성자</td><td><input type="text" name="writer"></td>
				</tr>
				<tr>
					<td>제목</td><td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td>내용</td><td><textarea name="description"></textarea></td>
				</tr>
				<tr>
					<td>코드</td><td><input type="text" name="code"></td>
				</tr>
				<tr>
					<td>카테고리</td><td><input type="text" name="category"></td>
				</tr>
				<tr>
					<td>레벨</td><td><input type="text" name="level"></td>
				</tr>
			</table>
			<input type="submit" value="글 쓰기">
			<button type="button" onclick="location.href='boardList.php';">목록으로</button>
		</form>
	</body>
</html>
