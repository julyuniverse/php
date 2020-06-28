<?php
$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");

header("Content-type: application/vnd.ms-excel");
header( "Content-type: application/vnd.ms-excel; charset=utf-8"); //문자 
header("Content-Disposition: attachment; filename = resume.xls"); //파일 이름 설정
header("Content-Description: PHP4 Generated Data");

$resume_no = $_GET['resume_no'];

$sql = "select * from resume where resume_no = '".$resume_no."'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$EXCEL_FILE="
<table border='1'>
  <tr>
    <td>이름</td><td>".$row['name']."</td>
    <td>생년월일</td><td>".$row['birthday']."</td>
  </tr>
  <tr>
    <td>성별</td><td>".$row['gender']."</td>
    <td>이메일</td><td>".$row['email']."</td>
  </tr>
  <tr>
    <td>주소</td><td colspan='3'>".$row['address']."</td>
  </tr>
";
$sql = "select * from academic_background where resume_no = '".$resume_no."'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$EXCEL_FILE.="
  <tr>
    <td>학력사항</td>
    <td colspan='3'>
      <table border='1'>
        <tr>
          <td>최종학력</td><td>".$row['final_school']."</td>
        </tr>
        <tr>
          <td>학교이름</td><td>".$row['school_name']."</td>
        </tr>
        <tr>
          <td>재학기간</td><td>".$row['school_period_start']."~".$row['school_period_end']."</td>
        </tr>
        <tr>
          <td>전공</td><td>".$row['major']."</td>
        </tr>
      </table>
    </td>
  </tr>
  ";
  $sql = "select * from career where resume_no = '".$resume_no."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $EXCEL_FILE.="
    <tr>
      <td>경력사항</td>
      <td>
        <table border='1'>
          <tr>
            <td>회사이름</td><td>".$row['corporate_name']."</td>
          </tr>
          <tr>
            <td>재직기간</td><td>".$row['service_period_start']."~".$row['service_period_end']."</td>
          </tr>
          <tr>
            <td>근무부서</td><td>".$row['department']."</td>
          </tr>
        </table>
      </td>
    </tr>
  ";


$EXCEL_FILE.="</table>";
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
echo $EXCEL_FILE;

?>
