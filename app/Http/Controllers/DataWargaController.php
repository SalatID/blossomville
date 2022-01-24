<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DataWargaController extends Controller
{
    public function dataWarga()
    {
        if(session()->get('userData')['level']==0 || session()->get('userData')['level']==1){
            $dataWarga = User::whereIn('level',[3,2])->get();
        } else if(session()->get('userData')['level']==2){
            $dataWarga = User::where('level',3)->where('id_rt',session()->get('userData')['rt'])->get();
        } 
        return view('pages.admin.datawarga',compact('dataWarga'));
    }
}
