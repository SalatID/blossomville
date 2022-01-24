<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class GuestController extends Controller
{
    public function index()
    {
        return view('pages.guest.landingpage');
    }

    public function datawarga()
    {
        $title = "Data Warga";
        $page = true;
        $dataWarga = User::whereIn('level',[3,2])->whereNotNull('email_verified_at')->where('verified',DB::raw('1'))->get();
        return view('pages.guest.datawarga',compact('title','page','dataWarga'));
    }
}
