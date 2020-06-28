<?php
$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");
$resume_no = $_GET['resume_no'];


$sql = "select * from resume where resume_no = '".$resume_no."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style>
  @page{
    size: 21.0cm, 29.7cm;
    margin:0;
  }
  #print{
    width:21.0cm;
    height:29.7cm;
  }

  .tb1{
    margin:0 auto;
    width:90%;
    height:1100px;
    border:1px solid black;
    border-collapse:collapse;
  }

  table{
    width:100%;
    height:100%;
    border:1px solid black;
    border-collapse:collapse;
  }
  th, td{
    border:1px solid black;
  }
  </style>
  <script>
    function print_start(){
      var resume_no = document.getElementById("resume_no").value;
      alert(resume_no);

      var inbody = document.body.innerHTHML;

      window.onbeforeprint = function(){
        document.body.innerHTML = document.getElementById("print").innerHTML;
      }
      window.onafterprint = function(){
        document.body.innerHTML = inbody;
      }
      window.print();
      location.href="resume_read.php?resume_no="+resume_no; //프린트 이후 get 변수가 넘기기
    }
  </script>
  <body>
    <input id="resume_no" type="text" name="resume_no" value="<?=$row['resume_no']?>">
    <div id="print">
    <table class="tb1">
      <tr>
        <th>이름</th><td><input type="text" name="name" value="<?=$row['name']?>"></td>
        <th>생년월일</th><td><input type="date" name="birthday" value="<?=$row['birthday']?>"></td>
      </tr>
      <tr>
        <th>성별</th>
        <td>
          <input type="text" name="gender" value="<?=$row['gender']?>">
        </td>
        <th>이메일</th><td><input type="text" name="email" value="<?=$row['email']?>"></td>
      </tr>
      <tr>
        <th>휴대폰</th><td><input type="text" name="phone" value="<?=$row['phone']?>"></td>
      </tr>
      <tr>
        <th>주소</th><td colspan="3"><input type="text" name="address" value="<?=$row['address']?>"></td>
      </tr>
      <tr>
        <th>학력사항</th>
        <td colspan="3" style="padding:0px;">
          <?php
          $sql = "select * from academic_background where resume_no = '".$resume_no."'";

          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          ?>
          <table style="border:0px;">
            <tr>
              <th style="border:0px; border-bottom:1px solid black;">최종학력</th>
              <td style="border:0px; border-bottom:1px solid black;">
                <input type="text" name="final_school" value="<?=$row['final_school']?>">
              </td>
            </tr>
            <tr>
              <th style="border:0px; border-bottom:1px solid black;">학교이름</th>
              <td style="border:0px; border-bottom:1px solid black;">
                <input type="text" name="school_name" value="<?=$row['school_name']?>">
              </td>
            </tr>
            <tr>
              <th style="border:0px; border-bottom:1px solid black;">재학기간</th>
              <td style="border:0px; border-bottom:1px solid black;">
                <input type="text" name="school_period_start" value="<?=$row['school_period_start']?>">
                ~<input type="text" name="school_period_end" value="<?=$row['school_period_end']?>">
              </td>
            </tr>
            <tr>
              <th style="border:0px; border-bottom:1px solid black;">전공</th>
              <td style="border:0px; border-bottom:1px solid black;"><input type="text" name="major" value="<?=$row['major']?>"></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <th>경력사항</th>
        <td colspan="3" style="padding:0px;">
          <?php
          $sql = "select * from career where resume_no = '".$resume_no."'";

          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          ?>
          <table style="border:0px;">
            <tr>
              <th style="border:0px; border-bottom:1px solid black;">회사이름</th>
              <td style="border:0px; border-bottom:1px solid black;">
                <input type="text" name="corporate_name" value="<?=$row['corporate_name']?>">
              </td>
            </tr>
            <tr>
              <th style="border:0px; border-bottom:1px solid black;">재직기간</th>
              <td style="border:0px; border-bottom:1px solid black;">
                <input type="text" name="service_period_start" value="<?=$row['service_period_start']?>">
                ~<input type="text" name="service_period_end" value="<?=$row['service_period_end']?>">
              </td>
            </tr>
            <tr>
              <th style="border:0px; border-bottom:1px solid black;">근무부서</th>
              <td style="border:0px; border-bottom:1px solid black;">
                <input type="text" name="department" value="<?=$row['department']?>">
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
  <button type="button" onclick="print_start()">프린트</button>
  <button type="button" onclick="document.location.href='process_resume_excel.php?resume_no=<?=$resume_no?>'">엑셀 저장</button>
  </body>
</html>
