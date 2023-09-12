<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\user;
use App\Models\User as ModelsUser;

use function Laravel\Prompts\select;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $UsersModel = new ModelsUser();
        $queryUser = $UsersModel->query()->where('email',$email)->first();
    
        if ($queryUser <> '') {
            if ($queryUser['password'] != $password) {
                $response = [
                    'status' => '404',
                    'code' => 2,
                    'messages' => 'Şifre Hatalı'
                ];    
            }
            else{
                $response = [
                    'status' => '200',
                    'code' => 2,
                    'messages' => 'Doğrulama Başarılı'
                ];

                session_start();
                $_SESSION['username'] = $queryUser['email'];
                $_SESSION['userid'] = $queryUser['id'];
            }
        }else{
            $response = [
                'status' => '404',
                'code' => 2,
                'messages' => 'Kullanıcı Hesabı Bulunamadı'
            ];
        }
        return response()->json($response, $response['status']);
    }


    //kayıt

    public function register(Request $request)
    {
        $username = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $UsersModel = new ModelsUser();
        $queryUser = $UsersModel->query()->where('email',$email)->first();
    
        if ($queryUser <> '') {
            $response = [
                'status' => '404',
                'code' => 2,
                'messages' => 'Kullanıcı Zaten Var'
            ];
        }else{

            $UsersModel->name = $username;
            $UsersModel->email = $email;
            $UsersModel->password = $password;
            $UsersModel->type = "0";
            if ($UsersModel->save()) {
                    
                $response = [
                    'status' => '200',
                    'code' => 2,
                    'messages' => 'İşlem Başarılı!'
                ];                
            }
            else
            {

                $response = [
                    'status' => '404',
                    'code' => 2,
                    'messages' => 'Hata!'
                ];
            
            }

        }
        return response()->json($response, $response['status']);
    }
}
