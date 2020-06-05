<?php
  //데이터베이스 연결
  $conn = mysqli_connect('127.0.0.1:3307', 'root', '123456', 'workbench');

  //밸류값 얻어오기
  $cno = $_GET['cno'];
  $bno = $_GET['bno'];

  //sql쿼리
  $sql = "delete from comment
          where cno = '{$cno}'";

  //결과값 $result에 담기
  $result = mysqli_query($conn, $sql);

  if($result === false){
    echo '삭제하는 과정에 문제가 생겼습니다.';
    error_log(mysqli_error($conn));
  }else{
    echo "<script>location.replace('boardRead.php?bno=$bno');</script>";
  }
?>
