<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dataUser = User::with('getrt')->find(session()->get('userData')['userId']);
        // dd($dataUser->getrt);
        $encryptId=Crypt::encryptString(json_encode(["id"=>session()->get('userData')['userId']]));
        if(session()->get('userData')['verified']){
            return view('pages.admin.dashboard',compact('dataUser','encryptId'));
        } else {
            return view('pages.admin.notverified',compact('dataUser','encryptId'));
        }
    }
}
