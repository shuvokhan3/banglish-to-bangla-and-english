<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\key;

class JWTToken{
    public static function CreateToken($userEmail,$userId){
        //get the key from the .env file
        $key = env('JWT_KEY');

        $payload = array(
            'iss' => 'laravel-token',//Token Issuare name
            'iat' => time(), //token creation time
            'exp' => time() + 3600,//token exp time
            'userEmail' => $userEmail,
            'userId' => $userId
        );

        return JWT::encode($payload,$key,'HS256');
    }

    public static function CreateTokenForSetPassword($userEmail){
        $key = env('JWT_KEY');

        $payload = array(
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60*10,
            'userEmail' => $userEmail,
            'userId' => $userId
        );

        return JWT::encode($payload,$key,'HS256');
    }

    public static function VerifyToken($token){
        try{
            if($token == null){
                return "unauthorized";
            }
            $key = env('JWT_KEY');
            $decoded = JWT::decode($token,new Key($key,'HS256'));

            return $decoded;
        }catch(\Exception $e){
            return "unauthorized";
        }
    }


}
