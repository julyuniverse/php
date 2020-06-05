<!doctype html>
<?php
  //데이터베이스 연결
  $conn = mysqli_connect('127.0.0.1:3307', 'root', '123456', 'workbench');

  //밸류값 얻어오기
  $bno = $_GET['bno'];

  //sql쿼리
  $sql = "select bno, writer, title, description, created from board where bno=".$bno;

  //결과값 $result에 담기
  $result = mysqli_query($conn, $sql);

  //$row에 배열화해서 담기
  $row = mysqli_fetch_array($result);

  //댓글sql쿼리
  $sql2 = "select board_bno, cno, writer, description, created
            from comment
            where board_bno = '{$bno}'";

  //결과값 $result2에 담기
  $result2 = mysqli_query($conn, $sql2);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>boardRead</title>
  </head>
  <body>
    <header>
      <h1>글 상세보기</h1>
    <header>
    <hr />

    <!-- 게시물 상세 보기 -->
    <section>
      <form action="process_update.php" method="post">
        <input type="hidden" name="bno" value="<?php print $row['bno'];?>">
        <table>
          <tr>
            <td>작성자</td><td><input type="text" value="<?php print $row['writer'];?>" readonly="readonly"></td>
          </tr>
          <tr>
            <td>제목</td><td><input type="text" name="title" size="60" value="<?php print $row['title'];?>"></td>
          </tr>
          <tr>
            <td>내용</td><td><textarea name="description" cols="80" rows="10"><?php print $row['description'];?></textarea></td>
          </tr>
          <tr>
            <td>작성일자</td><td><input type="text" value="<?php print $row['created'];?>" readonly="readonly"></td>
          </tr>
        </table>
        <button type="submit" onclick="if(!confirm('수정하시겠습니까?')){return false;}">수정</button>
        <a href="process_delete.php?bno=<?=$bno?>" onclick="if(!confirm('삭제하시겠습니까?')){return false;}"><button type="button">삭제</button></a>
        <button type="button" onclick="location.href='boardList.php'">목록으로</button>
      </form>
    </section>

    <!-- 댓글 작성 -->
    <h2>댓글</h2>
    <section>
      <form action="process_cmtwrite.php" method="post">
        <input type="hidden" name="bno" value="<?php print $row['bno'];?>">
        <table>
          <tr>
            <td>작성자</td><td><input type="text" name="writer" size="10"></td>
            <td>내용</td><td><input type="text" name="description" size="60"></td>
            <td><input type="submit" value="댓글 작성"></td>
          </tr>
        </table>
      </form>
    </section>
    <hr/>

    <!-- 댓글 리스트 -->
    <table>
      <?php
        while($row = mysqli_fetch_array($result2)){
      ?>
      <form action="process_cmtupdate.php" method="post">
        <tr>
          <td><input type="hidden" name="bno" value="<?php print $row['board_bno'];?>"></td>
          <td><input type="hidden" name="cno" value="<?php print $row['cno'];?>"></td>
          <td><?php print $row['writer'];?></td>
          <td><input type="text" name="description" size="80" value="<?php print $row['description'];?>"></td>
          <td><?php print $row['created'];?></td>
          <td><input type="submit" value="수정" onclick="if(!confirm('수정하시겠습니까?')){return false;}"></td>
          <td><a href="process_cmtdelete.php?cno=<?=$row['cno'];?>&bno=<?=$row['board_bno'];?>" onclick="if(!confirm('삭제하시겠습니까?')){return false;}"><button type="button">삭제</button></a></td>
        </tr>
      </form>
      <?php
        }
      ?>
    </table>
  </body>
</html>
