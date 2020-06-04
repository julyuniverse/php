//수정해봄
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>boardList</title>
  </head>
  <style>
    th{padding:14px;}

  </style>
  <body>
    <?php
      $conn = mysqli_connect('127.0.0.1:3307', 'root', '123456', 'workbench');

      $sql = "select * from board";

      $result = mysqli_query($conn, $sql);
    ?>

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
                  <td><?php echo $row[0];?></td>
                  <td><?php print $row[1];?></td>
                  <td><a href="read.php?bno=<?=$row['bno']?>"><?php print $row['title'];?></a></td>
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
