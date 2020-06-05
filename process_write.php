<?php
  //데이터베이스 연결
  $conn = mysqli_connect('127.0.0.1:3307', 'root', '123456', 'workbench');

  //sql쿼리
  $sql = "
    insert into board
      (writer, title, description, created)
    values(
      '{$_POST['writer']}',
      '{$_POST['title']}',
      '{$_POST['description']}',
      NOW()
      )
  ";

  //결과값 $result에 담기
  $result = mysqli_query($conn, $sql);

  if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    error_log(mysqli_error($conn));
  }else{
    echo ("<script>location.replace('boardList.php');</script>");
  }
?>
