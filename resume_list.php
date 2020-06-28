<?php
$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <th>이력서 번호</th>
      </tr>
      <?php
      $sql = "select * from resume";

      $result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_assoc($result)){
      ?>
      <tr>
        <td><a href="resume_read.php?resume_no=<?=$row['resume_no']?>"><?=$row['resume_no']?></a></td>
      </tr>
      <?php
    }
      ?>
    </table>
  </body>
</html>
