<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DashboardBanner;
use App\Models\DashboardActivity;
use App\Models\DashboardTestimoni;
use App\Models\Product;
use App\Models\Store;
use App\Models\RtRw;
use DB;

class GuestController extends Controller
{
    public function index()
    {
        $banner = DashboardBanner::all();
        $activity = DashboardActivity::all();
        $rt = RtRw::all();
        $testimoni = DashboardTestimoni::with('getcreator')->limit(10)->get();
        // dd($testimoni->getcreator);
        $product = Product::with("getstore")->limit(10)->get();
        return view('pages.guest.landingpage',compact('banner','activity','rt','testimoni','product'));
    }

    public function datawarga()
    {
        $title = "Data Warga";
        $page = true;
        $dataWarga = User::whereIn('level',[3,2])->whereNotNull('email_verified_at')->where('verified',DB::raw('1'))->get();
        return view('pages.guest.datawarga',compact('title','page','dataWarga'));
    }
}
