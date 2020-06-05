<!DOCTYPE html>
<?php
  //데이터베이스 연결
  $conn = mysqli_connect('127.0.0.1:3307', 'root', '123456', 'workbench');


  //sql쿼리
  $sql = "select * from board";

  //결과값 $result에 담기
  $result = mysqli_query($conn, $sql);
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>boardList</title>
  </head>
  <style>
    th{padding:14px;}
  </style>
  <body>
    <div>
      <header>
        <h1>게시판</h1>
      </header>
      <hr/>
      <section>
        <table>
          <thead>
            <tr><th>글 번호</th><th>작성자</th><th>제목</th><th>작성일자</th></tr>
          </thead>
          <tbody>
            <?php
              while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php print $row['bno'];?></td>
              <td><?php print $row['writer'];?></td>
              <td><a href="boardRead.php?bno=<?=$row['bno']?>"><?php print $row['title'];?></a></td>
              <td><?php print $row['created'];?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </section>
      <button type="button" onclick="location.href='boardWrite.php'">글 쓰기</button>
    </div>
  </body>
</html>
