<?php
require_once "./conn.php";
require_once "./JWT.php";

$jwt = new \Jwt\JWT();

$email = base64_encode($_POST['email']);
$password = base64_encode($_POST['password']);

// 유저 정보를 가진 jwt 만들기
$token = $jwt->hashing(array(
    'exp' => time() + 180, // 만료기간
    'created' => time(), // 생성일
    'email' => $email,
    'password' => $password,
));

$qry = "insert into users (email, password, token) values ('".$email."', '".$password."', '".$token."');";
$result = mysqli_query($conn, $qry);
if($result == true) {
    echo 1;
}