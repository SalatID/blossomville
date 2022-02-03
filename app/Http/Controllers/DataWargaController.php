<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RtRw;
use Illuminate\Support\Facades\Crypt;
use DB;

class DataWargaController extends Controller
{
    public function dataWargas()
    {
        if(session()->get('userData')['level']==0 || session()->get('userData')['level']==1){
            $dataWarga = User::orderBy('full_name')->get();
        } else if(session()->get('userData')['level']==2){
            $dataWarga = User::orderBy('full_name')->where('level',3)->where('id_rt',session()->get('userData')['rt'])->get();
        } 
        return view('pages.admin.datawargas',compact('dataWarga'));
    }

    public function dataWarga($idWarga)
    {
        $idWarga = Crypt::decryptString($idWarga);
        // dd($idWarga);
        $dataWarga =User::with('getrt')
        ->leftJoin('dbs_rt as a',function($join){
           $join->on( 'a.id','users.id_rt');
           $join->on('users.level',DB::raw("2"));
        })
        ->where(["users.id"=>$idWarga])->first();
        $dataFamily = User::where(['kk'=>$dataWarga->kk])->get();
        // dd($dataWarga);
        return view('pages.admin.datawarga',compact('dataWarga','idWarga','dataFamily'));
    }

    public function profile()
    {
        $idWarga = Crypt::encryptString(auth()->user()->id);
        $rt = RtRW::get();
        $dataWarga =User::with('getrt')
        ->leftJoin('dbs_rt as a',function($join){
           $join->on( 'a.id','users.id_rt');
           $join->on('users.level',DB::raw("2"));
        })
        ->where(["users.id"=>auth()->user()->id])->first();
        $dataFamily = User::where(['kk'=>$dataWarga->kk])->get();
        // dd($dataWarga);
        return view('pages.admin.profile',compact('dataWarga','idWarga','rt','dataFamily'));
    }
}
