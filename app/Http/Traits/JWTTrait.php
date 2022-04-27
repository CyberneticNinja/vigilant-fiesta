<?php
    namespace App\Http\Traits;
    use Firebase\JWT\JWT; 

    trait JWTTrait {
        public function createToken(string $email) {
            $key = env('JWT_KEY');
            $payload = array(
                "iss" => $_SERVER['SERVER_NAME'],
                "exp" => time()+(3600),//60 mins
                "user" => $email
            );

            $jwt = JWT::encode($payload, $key, 'HS256');
            return $jwt;
        }
    }