<?php
	//데이터베이스연결
	$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");

	//밸류값 얻어오기
	$bno = $_GET['bno'];

	$sql = "select * from board where bno = $bno";

	echo $sql;

	$result = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_array($result);
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>boardRead</title>
	</head>
	<body>
		<header>
			<h1>게시물 상세보기</h1>
		</header>
		<hr/>

		<form action="process_update.php" method="post">
			<input type="hidden" name="bno" value="<?=$row['bno']?>">
			<table>
				<tr>
					<td>작성자</td><td><input type="text" name="writer" value="<?=$row['writer']?>"></td>
				</tr>
				<tr>
					<td>제목</td><td><input type="text" name="title" value="<?=$row['title']?>"></td>
				</tr>
				<tr>
					<td>내용</td><td><textarea name="description"><?=$row['description']?></textarea></td>
				</tr>
				<tr>
					<td>작성일자</td><td><input type="text" name="created" value="<?=$row['created']?>"></td>
				</tr>
				<tr>
					<td>코드</td><td><input type="text" name="code" value="<?=$row['code']?>"></td>
				</tr>
				<tr>
					<td>카테고리</td><td><input type="text" name="category" value="<?=$row['category']?>"></td>
				</tr>
				<tr>
					<td>레벨</td><td><input type="text" name="level" value="<?=$row['level']?>"></td>
				</tr>
			</table>
			<input type="submit" value="수정하기" onclick="if(!confirm('수정하시겠습니까?')){return false};">
		</form>
	</body>
</html>
