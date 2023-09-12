<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use App\Models\ticket as ModelsTicket;
use App\Models\User as ModelsUser;
use GuzzleHttp\Psr7\Query;

session_start();
class TicketController extends Controller
{   

    function UpdateTicket(Request $request){
        $TicketModel = new ModelsTicket();
        $updateQuery = $TicketModel->query()->where('id',$request->input('id'))->update(['explanation' => $request->input('explanation'),'status' => $request->input('status'),'category' => $request->input('category')]);
        
        if ($updateQuery) {
            $response = [
                'status' => '200',
                'code' => '1',
                'messages' => 'Başarılı'
            ];  
        }else{
            $response = [
                'status' => '404',
                'code' => '1',
                'messages' => 'Hata'
            ];  
        }

        return response()->json($response, $response['status']);
    
    }

    
    function RemoveTicket(Request $request){
        $TicketModel = new ModelsTicket();
        $deleteQuery = $TicketModel->query()->where('id',$request->input('id'))->delete();
        
        if ($deleteQuery) {
            $response = [
                'status' => '200',
                'code' => '1',
                'messages' => 'Başarılı'
            ];  
        }else{
            $response = [
                'status' => '404',
                'code' => '1',
                'messages' => 'Hata'
            ];  
        }

        return response()->json($response, $response['status']);
    
    }

    function ListTicket(Request $request){
        
        $TicketModel = new ModelsTicket();

        $UsersModel = new ModelsUser();
        $UserType = $UsersModel->query()->where('id',$_SESSION['userid'])->value('type');

        if ($UserType == 1) { //ADMIN
          $queryAll = $TicketModel->query()->get();
             
          if ($queryAll) {  
            $response = [
                'status' => '200',
                'data' => $queryAll,
                'messages' => 'Başarılı'
            ];  
          }
          else {
            $response = [
                'status' => '404',
                'data' => '',
                'messages' => 'Hata!'
            ];  
          }

        }else{
            $queryOnlyUser = $TicketModel->query()->get()->where('user_id',$_SESSION['userid']);
            if ($queryOnlyUser) {
                $response = [
                    'status' => '200',
                    'data' => $queryOnlyUser,
                    'messages' => 'Başarılı'
                ];
            }
            else{
                $response = [
                    'status' => '404',
                    'data' => '',
                    'messages' => 'Hata'
                ];
            }

               
        }

        
        return response()->json($response, $response['status']);

    }

    function AddTicket(Request $request) {
        $explanation = $request->input('explanation');
        $category = $request->input('category');

        $TicketModel = new ModelsTicket();
         
        $TicketModel->explanation = $explanation;
        $TicketModel->category = $category;
        $TicketModel->status =  'Beklemede';
        $TicketModel->user_id = $_SESSION['userid'];

        if ($TicketModel->save()) {
            $response = [
                'status' => '200',
                'code' => 2,
                'messages' => 'Ticket Oluşturuldu'
            ];       
        }else{
            $response = [
                'status' => '404',
                'code' => 2,
                'messages' => 'Hata!'
            ];    
        }

        return response()->json($response, $response['status']);
        
    }
}
