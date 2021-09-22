<?php
namespace Jwt;

class JWT
{
    protected $algorithm;
    protected $secret_key;

    // 생성자
    function __construct()
    {
        // 사용할 알고리즘
        $this->algorithm = "sha256";

        // 비밀 키
        $this->secret_key = "your secret key";
    }

    // jwt 발급하기
    function hashing(array $data): string
    {
        // 헤더 - 사용할 알고리즘과 타입 명시
        $header = json_encode(array(
            'algorithm' => $this->algorithm,
            'type' => 'JWT',
        ));

        // 페이로드 - 전달할 data
        $payload = json_encode($data);

        // 시그니처
        $signature = hash($this->algorithm, $header . $payload . $this->secret_key);

        return base64_encode($header . "." . $payload . "." . $signature);
    }

    // jwt 해석하기
    function dehashing($token)
    {
        // 구분자 .로 토큰 나누기
        $parted = explode(".", base64_decode($token));

        $signature = $parted[2];

        // 토큰 만들 때처럼 시그니처 생성 후 비교
        if(hash($this->algorithm, $parted[0] . $parted[1] . $this->secret_key) != $signature) {
            return "signature error";
        }

        // 만료 검사
        $payload = json_decode($parted[1], true);
        if($payload['exp'] < time()) { // 유효시간이 현재 시간보다 전이면
            return "exp error";
        }

        return json_decode($parted[1], true);
    }
}