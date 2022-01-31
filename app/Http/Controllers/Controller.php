<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\SiteSetting;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // protected $cookieName;
    // protected $cookieVal;
    // public function __construct()
    // {
    //     $this->cookieName = 'site_config';
    //     if($this->getCookie()==null){
    //         $siteData = SiteSetting::first();
    //         $this->cookieVal = $siteData;
    //         // dd($this->setCookie());
    //     } 
    // }

    // public function setCookie(){
    //     $minutes = 525600;
    //     $response = new Response('Set Cookie');
    //     $response->withCookie(cookie($this->cookieName, $this->cookieVal, $minutes));
    //     return $response;
    //  }

    //  public function getCookie(){
    //     $value = request()->cookie($this->cookieName);
    //     return $value;
    //  }
}
