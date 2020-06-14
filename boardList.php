<?php
	//데이터베이스 연결
	$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");
	
	//밸류값 얻어오기
	$code = $_GET['code'];
	$category = $_GET['category'];
	$opt = $_GET['opt'];
	$opt_val = $_GET['opt_val'];
	$start = $_GET['start'];

	$param = "category=$category&opt=$opt&opt_val=$opt_val";
	$param2 = "code=$code&opt=$opt&opt_val=$opt_val";
	$param3 = "code=$code&category=$category&opt=$opt&opt_val=$opt_val";

	//페이징처리
	$post_num = 5;
	if(!$start){
		$start = 0;
	}
	
	if($code != ""){
		$subQry .= "and code = '".$code."'";
	}
	
	if($category != ""){
		$subQry .= "and category = '".$category."'";
	}

	if($opt != ""){
		$subQry .= "and $opt like '%$opt_val%'";
	}	
	
	//전체 게시물 수
	$sql = "select count(*) from board where 1 $subQry";
	$result = mysqli_query($conn, $sql);
	$t = mysqli_fetch_array($result);
	$all = $t[0];
	
	$sql = "select * from board where 1 $subQry limit $start, $post_num";
	
	echo $sql;
	
	$result = mysqli_query($conn, $sql);

	
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>boardList</title>
	</head>
	<body>
		<header>
			<h1>게시판 목록</h1>
		<header>
		<hr/>
		
		<a href="boardList.php"><button type="button">전체 게시판</button></a>
		<a href="boardList.php?code=a&<?=$param?>"><button type="button">a게시판</button></a>
		<a href="boardList.php?code=b&<?=$param?>"><button type="button">b게시판</button></a>
		<hr/>

		<a href="boardList.php?category=101&<?=$param2?>"><button type="button">회원 글목록</button></a>
		<a href="boardList.php?category=102&<?=$param2?>"><button type="button">회원 후기</button></a>

		<table>
			<thead>
				<tr>
					<th>글 번호</th><th>작성자</th><th>제목</th><th>작성일자</th><th>코드</th><th>카테고리</th><th>레벨</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row = mysqli_fetch_array($result)){
				?>
				<tr>
					<td><?=$row['bno']?></td>
					<td><?=$row['writer']?></td>
					<td><a href="boardRead.php?bno=<?=$row['bno']?>"><?=$row['title']?></a></td>
					<td><?php echo date('Y-m-d',strtotime($row['created']))?></td>
					<td><?=$row['code']?></td>
					<td><?=$row['category']?></td>
					<td><?=$row['level']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>

		<!-- 검색 -->
		<form action="#" method="get">
			<select name="opt">
				<option value=""></option>
				<option value="writer">작성자</option>
				<option value="title">제목</option>
				<option value="created">작성일자</option>
			</select>
			<input type="text" name="opt_val">
			<input type="submit" value="검색">
		</form>
		<?php
			$posts = $all/$post_num;
			for($i=0;$i<$posts;$i++){
				$start_num = $i * 5;
				$pn = $i+1;
				echo "<a href='".$_SERVER['PHP_SELF']."?start=$start_num&$param3'>[$pn]</a>";
			}
		?>
		<br/>
		<button type="button" onclick="location.href='boardWrite.php';">글 쓰기</button>
	</body>
</html>
