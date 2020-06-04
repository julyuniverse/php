<!DOCTYPE html>
<?php
  $conn = mysqli_connect('127.0.0.1:3307', 'root', '123456', 'workbench');

  if(!isset($_GET['bno'])){
    echo "Invalid value input";
    exit();
  }
  

  $bno = $_GET['bno'];

  $sql = "select writer, title, description, created from board where bno=".$bno;

  // 데이터 가져오기
  $result = mysqli_query($conn, $sql) or die("sql 에러");
  $row = mysqli_fetch_array($result);

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>read</title>
  </head>
  <body>
    <div>
      <header>
        <h1>글 상세보기</h1>
      <header>
      <hr />

      <section>
        <table>
          <tr>
            <td>작성자</td><td><input type="text" value="<?php print $row['writer'];?>"></td>
          </tr>
          <tr>
            <td>제목</td><td><input type="text" size="60" value="<?php print $row['title'];?>"></td>
          </tr>
          <tr>
            <td>내용</td><td><textarea cols="80" rows="10"><?php print $row['description'];?></textarea></td>
          </tr>
          <tr>
            <td>작성일자</td><td><input type="text" value="<?php print $row['created'];?>"></td>
          </tr>
        </table>
        <button type="button" onclick="location.href='boardList.php'">목록으로</button>

      </section>
  </body>
</html>
