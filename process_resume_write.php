<?php
$conn = mysqli_connect("localhost", "root", "1234", "mysqldb");//데이터베이스 연결

//밸류값 얻어오기
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$final_school = $_POST['final_school'];
$school_name = $_POST['school_name'];
$school_period_start = $_POST['school_period_start'];
$school_period_end = $_POST['school_period_end'];
$major = $_POST['major'];
$corporate_name = $_POST['corporate_name'];
$service_period_start = $_POST['service_period_start'];
$service_period_end = $_POST['service_period_end'];
$department = $_POST['department'];

echo $name."<br>";
echo $birthday."<br>";
echo $gender."<br>";
echo $email."<br>";
echo $phone."<br>";
echo $address."<br>";
echo $final_school."<br>";
echo $school_name."<br>";
echo $school_period_start."<br>";
echo $school_period_end."<br>";
echo $major."<br>";
echo $corporate_name."<br>";
echo $service_period_start."<br>";
echo $service_period_end."<br>";
echo $department."<br>";

$sql = "
        insert into resume(name, birthday, gender, email, phone, address)
        values('".$name."', '".$birthday."', '".$gender."', '".$email."', '".$phone."', '".$address."')
        ";
$result = mysqli_query($conn, $sql);

if($result === false){
  echo "저장시 에러가 생겼습니다.'<br>'";
}else{
  echo "resume 테이블 저장 성공.'<br>'";
}

$sql = "insert into academic_background
        (resume_no, final_school, school_name, school_period_start, school_period_end, major)
        values(
          (select resume_no from resume where name = '".$name."' and birthday = '".$birthday."' and gender = '".$gender."' and email = '".$email."' and phone = '".$phone."' and address = '".$address."'),
          '".$final_school."', '".$school_name."', '".$school_period_start."', '".$school_period_end."', '".$major."'
          )";
$result = mysqli_query($conn, $sql);

if($result === false){
  echo "저장시 에러가 생겼습니다.'<br>'";
}else{
  echo "academic_background 테이블 저장 성공.'<br>'";
}

$sql = "insert into career
        (resume_no, corporate_name, service_period_start, service_period_end, department)
        values(
          (select resume_no from resume where name = '".$name."' and birthday = '".$birthday."' and gender = '".$gender."' and email = '".$email."' and phone = '".$phone."' and address = '".$address."'),
          '".$corporate_name."', '".$service_period_start."', '".$service_period_end."', '".$department."')
        ";
$result = mysqli_query($conn, $sql);

if($result === false){
  echo "저장시 에러가 생겼습니다.'<br>'";
}else{
  echo "career 테이블 저장 성공.'<br>'";
}

?>
