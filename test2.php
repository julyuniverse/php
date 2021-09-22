<?php
require_once "./conn.php";
require_once "./JWT.php";

$jwt = new \Jwt\JWT();

$email = base64_encode($_POST['email']);
$password = base64_encode($_POST['password']);

$qry = "select * from users where email = '".$email."' and password = '".$password."';";
$result = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($result);

echo $row['token'];
$token = $row['token'];
echo "\n";

$data = $jwt->dehashing($token);
$parted = explode(".", base64_decode($token));
$payload = json_decode($parted[1], true);

print_r($payload);
echo "\n";
echo "email: " . base64_decode($payload['email']);
echo "\n";
echo "password: " . base64_decode($payload['password']);
echo "\n";
echo "exp: " . $payload['exp'];
echo "\n";
echo "now: " . time();