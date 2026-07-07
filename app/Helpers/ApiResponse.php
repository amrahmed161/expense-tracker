<?php
 namespace App\Helpers;

 class ApiResponse{
    public static function send( int $code, bool $status,$message, mixed $data = null,mixed $errors = null){
        return response()->json([
            'status'=>$status,
            'code'=>$code,
            'message'=>$message,
            'data'=>$data,
            'errors'=>$errors,
        ],$code);
    }
 }
