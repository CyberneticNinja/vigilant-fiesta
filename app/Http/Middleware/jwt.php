<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT as firebaseJWT; 
use Ramsey\Uuid\Uuid;
use Firebase\JWT\Key;

class jwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $errors = array();

        if($request->header('alg') == "HS256")
        {
            if($request->header('typ') == "JWT")
            {
                if($request->bearerToken()) {

                    $key = env('JWT_KEY');
                    $jwt_token = $request->bearerToken();
                                   
                    try {
                        firebaseJWT::decode(
                            $jwt_token,
                            new Key($key,
                            'HS256'
                            ));
                            return $next($request);
                    } catch (\Exception $e) {
                        return response()->json([
                            'message' => $e->getMessage()
                        ],400);
                    }                    
                }
                else
                {
                    $errors[] = 'no token';
                }
            }
            else
            {
                $errors[] = 'incorrect headers';
            }
        }
        else
        {
            $errors[] = 'incorrect headers';
        }

        return response()->json([
            'message' => $errors
        ],400);
        
    }
}
