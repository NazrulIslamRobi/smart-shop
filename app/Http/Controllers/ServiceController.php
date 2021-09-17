<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
 
   static public function successMessage($message){
        $notification=[
            'alert-type'=> 'success',
            'message'=> $message,
        ];
        return $notification;
    }
   
    
}
