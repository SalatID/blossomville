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
use Str;
use Illuminate\Support\Facades\Crypt;
use File;

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

    public function activityPage()
    {
        $activity = DashboardActivity::all();
        return view('pages.admin.activity',compact('activity'));
    }

    public function storeActivity()
    {
        $insData = [
            "title"=>request('title'),
            "description"=>request('description'),
            "activity_date"=>request('activity_date'),
            "created_user"=>auth()->user()->id
        ];
        $activityImg = request()->file('activity_img');
        $dir = 'activity/';
        $fileName = Str::random(15).".".$activityImg->getClientOriginalExtension();
        $activityImg->move($dir,$fileName);
        $insData['activity_img']=$dir.$fileName;
        $insSts = DashboardActivity::create($insData);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Tambah Aktifitas ".($insSts?'Berhasil':'Gagal')]);;
    }

    public function updActivity()
    {
        $updData = [
            "title"=>request('title'),
            "description"=>request('description'),
            "activity_date"=>request('activity_date'),
            "updated_user"=>auth()->user()->id
        ];
        $activityImg = request()->file('activity_img');
        if($activityImg!=null){
            $dir = 'activity/';
            $fileName = Str::random(15).".".$activityImg->getClientOriginalExtension();
            $activityImg->move($dir,$fileName);
            $updData['activity_img']=$dir.$fileName;
        }
        $updSts = DashboardActivity::where(["id"=>request('id')])->update($updData);
        return redirect()->back()->with(["error"=>!$updSts,"message"=>"Ubah Aktifitas ".($updSts?'Berhasil':'Gagal')]);;
    }

    public function detailActivity($id)
    {
        $title = "Aktfitas Warga";
        $page = true;
        $dataActivity = DashboardActivity::where(["id"=>Crypt::decryptString($id)])->first();
        return view('pages.guest.aktifitas',compact('title','page','dataActivity'));
    }

    public function jsonDetailActivity($id)
    {
        $dataActivity = DashboardActivity::where(["id"=>Crypt::decryptString($id)])->first();
        return response()->json($dataActivity);
    }

    public function delActivity($id)
    {
        $dataActivity = DashboardActivity::where(["id"=>Crypt::decryptString($id)])->first();
        if(File::exists(public_path($dataActivity->activity_img))){
            File::delete(public_path($dataActivity->activity_img));
        }
        DashboardActivity::where(["id"=>Crypt::decryptString($id)])->delete();
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);;
    }
}
