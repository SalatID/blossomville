<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\SiteSetting;
use Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dataUser = User::with('getrt')->find(session()->get('userData')['userId']);
        // dd($dataUser->getrt);
        $encryptId=Crypt::encryptString(session()->get('userData')['userId']);
        if(session()->get('userData')['verified']){
            return view('pages.admin.dashboard',compact('dataUser','encryptId'));
        } else {
            return view('pages.admin.notverified',compact('dataUser','encryptId'));
        }
    }

    public function siteSetting()
    {
        $siteData=  SiteSetting::first();
        return view('pages.admin.sitesetting',compact('siteData'));
    }

    public function storeSetting()
    {
        $siteData = SiteSetting::first();
        $dir ='site_assets/';
        $data = [
            'site_title'=>request('site_title'),
            'site_description'=>request('site_description'),
            'site_whatsapp'=>request('site_whatsapp'),
            'site_whatsapp_on'=>request('site_whatsapp_on'),
            'site_email'=>request('site_email'),
            'site_email_on'=>request('site_email_on'),
            'site_instagram'=>request('site_instagram'),
            'site_instagram_on'=>request('site_instagram_on'),
            'site_twitter'=>request('site_twitter'),
            'site_twitter_on'=>request('site_twitter_on'),
        ];
        $site_icon = request()->file('site_icon');
        if($site_icon){
            $fileNameIcon = Str::random(15).".".$site_icon->getClientOriginalExtension();
            $site_icon->move($dir,$fileNameIcon);
            $data['site_icon']=$dir.$fileNameIcon;
        }
        $site_favicon = request()->file('site_favicon');
        if($site_favicon){
            $fileNameFav = Str::random(15).".".$site_favicon->getClientOriginalExtension();
            $site_favicon->move($dir,$fileNameFav);
            $data['site_favicon']=$dir.$fileNameFav;
        }
        // dd(request()->all());
        if($siteData != null){
            $data['updated_user']=auth()->user()->id;
            $sts = SiteSetting::where(['id'=>$siteData->id])->update($data);
        } else {
            $data['created_user']=auth()->user()->id;
            $sts = SiteSetting::create($data);
        }
        return redirect()->back()->with(["error"=>!$sts,"message"=>"Ubah Setting  ".($sts?"Berhasil":"Gagal")]);
    }
}
