<?php
  //데이터베이스 연결
  $conn = mysqli_connect("localhost", "root", "1234", "mysqldb");

  $pt_code = $_POST['pt_code'];

  $sql = "select * from products where prod_pt_code = '".$pt_code."'";
  $result = mysqli_query($conn, $sql);
  echo '<option value="">--선택--</option>';
  while($row = mysqli_fetch_array($result)){
    echo '<option value="'.$row['prod_code'].'">'.$row['prod_name'].'</option>';
  }
?>
