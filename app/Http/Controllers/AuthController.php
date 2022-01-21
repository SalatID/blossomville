<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RtRw;
use Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        $rt = RtRW::get();
        return view('register',compact('rt'));
    }

    public function procRegister()
    {
        if(User::where(['email'=>request('email')])->exists())return redirect()->back()->with(["error"=>true,"message"=>"Email Sudah Di Registrasikan, Silahkan login atau lupa password jika lupa password"]);

        if(User::where(['nik'=>request('nik')])->exists())return redirect()->back()->with(["error"=>true,"message"=>"NIK Sudah Di Registrasikan, Silahkan login atau lupa password jika lupa password"]);

        if(User::where(['kk'=>request('kk')])->exists())return redirect()->back()->with(["error"=>true,"message"=>"Kartu Keluarga Sudah Di Registrasikan, Silahkan login atau lupa password jika lupa password"]);

        // dd(request()->all());
        $insData = [
            "full_name"=>request('full_name'),
            "email"=>request('email'),
            "password"=>Hash::make(request('password')),
            "place_birth"=>request('place_birth'),
            "date_birth"=>request('date_birth'),
            "gender"=>request('gender'),
            "blod_type"=>request('blod_type'),
            "religion"=>request('religion'),
            "job"=>request('job'),
            "nik"=>request('nik'),
            "kk"=>request('kk'),
            "sts"=>request('sts'),
            "address"=>request('address'),
            "block"=>request('block'),
            "house_number"=>request('house_number'),
            "id_rt"=>request('id_rt'),
            "rw"=>request('rw'),
            "village"=>request('village'),
            "distric"=>request('distric'),
            "city"=>request('city'),
            "province"=>request('province')
        ];
        $insSts = User::create($insData);
        return redirect()->back()->with(["error"=>$insSts,"Reistrasi ".($insSts?'Berhasil':'Gagal')]);
    }
    public function procLogin()
    {
      $credentials = request()->only('email', 'password');
      if (auth()->attempt($credentials)) {
         
          $sessionValue = [
            "userData"=>[
              "userId"=>auth()->user()->id,
              "fullName"=>auth()->user()->full_name,
              "email"=>auth()->user()->email,
              "level"=>auth()->user()->levelId,
            ]
          ];
          // dd($sessionValue);
          request()->session()->put("userData",$sessionValue);
          // if ($dataLogin->levelId==2) {
          //   return redirect('/indexGuru');
          // }
          return redirect('/greeting');
      }
      return redirect('/auth/login')->with(["error"=>"001","message"=>"His account cannot be found. Please use a different account"]);
    }
}
