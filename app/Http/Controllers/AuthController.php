<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RtRw;
use Hash;
use Mail;
use App\Mail\BlossomMail;
use URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

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
            "province"=>request('province'),
            "phone"=>request('phone'),
            "marriage"=>request('marriage')
        ];
        // dd(request()->all());
        $attc_ktp = request()->file('attc_ktp');
        $attc_kk = request()->file('attc_kk');
        $dir = 'attc/';
        $fileNameKTP = 'ktp_'.Str::random(15).".".$attc_ktp->getClientOriginalExtension();
        $fileNameKK = 'kk_'.Str::random(15).".".$attc_kk->getClientOriginalExtension();
        // upload file
        $attc_ktp->move($dir,$fileNameKTP);
        $attc_kk->move($dir,$fileNameKK);
        $insData['img_ktp']=$dir.$fileNameKTP;
        $insData['img_kk']=$dir.$fileNameKK;

        $insSts = User::create($insData);
        $userData = [
          "id"=>$insSts->id
        ];
        if($insData){
          $url = URL::temporarySignedRoute(
              'verifiedEmail', now()->addMinutes(30),["p"=>Crypt::encryptString(json_encode($userData))]
          );
          $data = json_encode([
            "subject"=>"Verifikasi Email",
            "view"=>"mail.register",
            "data"=>[
              "username"=>request('full_name'),
              "link"=>$url
            ]
          ]);
          // return $data;
          Mail::to(request('email'))->send(new \App\Mail\BlossomMail(json_decode($data)));
        }
        return redirect('/auth/login')->with(["error"=>!$insSts,"message"=>"Reistrasi ".($insSts?'Berhasil':'Gagal')]);
    }
    public function procLogin()
    {
      $credentials = request()->only('email', 'password');
      if (auth()->attempt($credentials)) {
         if(auth()->user()->email_verified_at==null)return redirect('/auth/login')->with(["error"=>true,"message"=>"Anda Belum Verifikasi Email, harap cek email anda, cek folder spam jika tidak ada email di kotak masuk"]);
          $sessionValue = [
              "userId"=>auth()->user()->id,
              "fullName"=>auth()->user()->full_name,
              "email"=>auth()->user()->email,
              "level"=>auth()->user()->level,
              "verified"=>auth()->user()->verified,
              "rt"=>auth()->user()->id_rt,
              "phone"=>auth()->user()->phone
          ];
          // dd($sessionValue);
          request()->session()->put("userData",$sessionValue);
          // if ($dataLogin->levelId==2) {
          //   return redirect('/indexGuru');
          // }
          return redirect('/admin');
      }
      return redirect('/auth/login')->with(["error"=>true,"message"=>"His account cannot be found. Please use a different account"]);
    }

    public function logout()
    {
            // User::where(['userId'=>auth()->user()->userId])->update(['loginStatus'=>'N']);
            auth()->logout();

            request()->session()->invalidate();
        
            request()->session()->regenerateToken();
        
            return redirect('/');
    }

    public function sendMail()
    {
      $data = json_encode([
        "subject"=>"test",
        "view"=>"mail.register",
        "data"=>[
          "username"=>"Salat",
          "link"=>"www.google.com"
        ]
      ]);
      Mail::to('root.mursalat@gmail.com')->send(new \App\Mail\BlossomMail(json_decode($data)));
    }

    public function verifiedEmail()
    {
      if(!request()->has('p')){
        abort(203);
      }
      $decript = json_decode(Crypt::decryptString(request('p')));
      // dd($decript->id);
      User::where(["id"=>$decript->id])->update(["email_verified_at"=>date("Y-m-d H:i:s")]);

      return redirect('/auth/login')->with(["error"=>false,"message"=>"Verifikasi email berhasil, silahkan login untuk melanjutkan"]);
    }

    public function verifiyUser($idWarga)
    {
      // dd(Crypt::decryptString($idWarga));
      $updSts =User::where(["id"=>Crypt::decryptString($idWarga)])->update(["verified"=>1]);
      return redirect()->back()->with(["error"=>!$updSts,"message"=>"Verifikasi  ".($updSts?"Berhasil":"Gagal")]);
    }

    public function updateProfile()
    {
      $updData = [
        "full_name"=>request('full_name'),
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
        "province"=>request('province'),
        "phone"=>request('phone'),
        "marriage"=>request('marriage')
      ];
      $dir = 'attc/';
      $attc_ktp = request()->file('attc_ktp');
      if($attc_ktp){
        $fileNameKTP = 'ktp_'.Str::random(15).".".$attc_ktp->getClientOriginalExtension();
        $attc_ktp->move($dir,$fileNameKTP);
        $updData['img_ktp']=$dir.$fileNameKTP;

      }

      $attc_kk = request()->file('attc_kk');
      if($attc_kk){
        $fileNameKK = 'kk_'.Str::random(15).".".$attc_kk->getClientOriginalExtension();
        $attc_kk->move($dir,$fileNameKK);
        $updData['img_kk']=$dir.$fileNameKK;

      }
      // upload file
      $updSts = User::where(['id'=>auth()->user()->id])->update($updData);
      return redirect()->back()->with(["error"=>!$updSts,"message"=>"Update ".($updSts?'Berhasil':'Gagal')]);
    }

    public function delUser($id)
    {
        User::where(["id"=>Crypt::decryptString($id)])->delete();
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);;
    }

    public function updSts($id,$level)
    {
      $dataWarga = User::where(["id"=>$id])->first();
      if($level==1){
        User::where(["level"=>$level])->update(["level"=>3]);
      } else {
        User::where(["level"=>$level,"id_rt"=>$dataWarga->id_rt])->update(["level"=>3]);
      }
      $updSts = User::where(["id"=>$id])->update(["level"=>$level]);
      return redirect()->back()->with(["eroor"=>!$updSts,"message"=>"Ubah Level ".($updSts?"Berhasil":"Gagal")]);
    }
}
