<!doctype html>
<html>
  <haed>
    <meta charset="utf-8";>
    <title>board</title>
  </head>
  <style>
    .table2 td{
      padding:10px;
    }
  </style>
  <body>
    <header>
      <h1>글 작성하기</h1>
    </header>
    <hr/>
    <form action="process_write.php" method="post">
      <table>
        <tr>
          <td>
            <table class="table2">
              <tr>
                <td>작성자</td>
                <td><input type="text" name="writer"></td>
              </tr>
              <tr>
                <td>제목</td>
                <td><input type="text" name="title" size=60></td>
              </tr>
              <tr>
                <td>내용</td>
                <td><textarea name="description" cols=85 rows=15></textarea></td>
              </tr>
            </table>
            <center>
              <input type="submit" value="글 작성">
              <button type="button" onclick="location.href='boardList.php'">취소</button>
            </center>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
