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
use App\Models\SiteSetting;
use DB;
use Str;
use Illuminate\Support\Facades\Crypt;
use File;

class GuestController extends Controller
{
    protected $siteSetting;

    public function __construct()
    {
        $this->siteSetting = SiteSetting::first();
    }
    public function index()
    {
        $banner = DashboardBanner::all();
        $activity = DashboardActivity::all();
        $rt = RtRw::all();
        $testimoni = DashboardTestimoni::with('getcreator')->limit(10)->get();
        // dd($testimoni->getcreator);
        $siteSetting = $this->siteSetting;
        $product = Product::with("getstore")->limit(10)->get();
        return view('pages.guest.landingpage',compact('banner','activity','rt','testimoni','product','siteSetting'));
    }

    public function datawarga()
    {
        $title = "Data Warga";
        $page = true;
        $dataWarga = User::whereIn('level',[3,2])->whereNotNull('email_verified_at')->where('verified',DB::raw('1'))->orderBy('full_name')->get();
        $siteSetting = $this->siteSetting;
        return view('pages.guest.datawarga',compact('title','page','dataWarga','siteSetting'));
    }

    public function activityPage()
    {
        $activity = DashboardActivity::all();
        $siteSetting = $this->siteSetting;
        return view('pages.admin.activity',compact('activity','siteSetting'));
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
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Tambah Aktifitas ".($insSts?'Berhasil':'Gagal')]);
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
        $siteSetting = $this->siteSetting;
        return view('pages.guest.aktifitas',compact('title','page','dataActivity','siteSetting'));
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

    public function testimoniPage()
    {
        if(session()->get('userData')['level']==0 || session()->get('userData')['level']==1|| session()->get('userData')['level']==2){
            $testimoni = DashboardTestimoni::with('getcreator')->get();
        } else if(session()->get('userData')['level']==3){
            $testimoni = DashboardTestimoni::with('getcreator')->where('created_user',auth()->user()->id)->get();
        } 
        $siteSetting = $this->siteSetting;
        return view('pages.admin.testimoni',compact('testimoni','siteSetting'));
    }

    public function storeTestimoni()
    {
        $insData = [
            "title"=>request('title'),
            "summary"=>request('summary'),
            "created_user"=>auth()->user()->id
        ];
        $insSts = DashboardTestimoni::create($insData);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Tambah Testimoni ".($insSts?'Berhasil':'Gagal')]);
    }

    public function updTestimoni()
    {
        $updData = [
            "title"=>request('title'),
            "summary"=>request('summary'),
        ];
        $updSts = DashboardTestimoni::where(["id"=>request('id')])->update($updData);
        return redirect()->back()->with(["error"=>!$updSts,"message"=>"Ubah Testimoni ".($updSts?'Berhasil':'Gagal')]);;
    }

    public function jsonDetailTestimoni($id)
    {
        $dataActivity = DashboardTestimoni::where(["id"=>Crypt::decryptString($id)])->first();
        return response()->json($dataActivity);
    }

    public function delTestimoni($id)
    {
        $dataActivity = DashboardTestimoni::where(["id"=>Crypt::decryptString($id)])->first();
        if(File::exists(public_path($dataActivity->activity_img))){
            File::delete(public_path($dataActivity->activity_img));
        }
        DashboardTestimoni::where(["id"=>Crypt::decryptString($id)])->delete();
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);;
    }

    public function storePage()
    {
        if(session()->get('userData')['level']==0 || session()->get('userData')['level']==1|| session()->get('userData')['level']==2){
            $tokos = Store::get();
        } else if(session()->get('userData')['level']==3){
            $tokos = Store::where('created_user',auth()->user()->id)->get();
        } 
        $siteSetting = $this->siteSetting;
        return view('pages.admin.store',compact('tokos','siteSetting'));
    }

    public function storeStore()
    {
        if(Store::where('created_user',auth()->user()->id)->count()>2){
            return redirect()->back()->with(["error"=>true,"message"=>"Tambah Toko Gagal, Satu Warga Maksimal DUA Toko"]);
        }
        $insData = [
            'store_name'=>request('store_name'),
            'address'=>request('address'),
            'description'=>request('description'),
            'phone'=>request('phone'),
            'whatsapp_sts'=>request('whatsapp_sts'),
            "created_user"=>auth()->user()->id
        ];
        // dd($insData);
        // 'store_banner','store_logo'

        $storeBanner = request()->file('store_banner');
        $dir = 'store/banner/';
        $fileName = Str::random(15).".".$storeBanner->getClientOriginalExtension();
        $storeBanner->move($dir,$fileName);
        $insData['store_banner']=$dir.$fileName;

        $storeLogo = request()->file('store_logo');
        $dir = 'store/banner/';
        $fileName = Str::random(15).".".$storeLogo->getClientOriginalExtension();
        $storeLogo->move($dir,$fileName);
        $insData['store_logo']=$dir.$fileName;
        
        $insSts = Store::create($insData);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Tambah Toko ".($insSts?'Berhasil':'Gagal')]);
    }

    public function productPage($id)
    {
        $idToko = Crypt::decryptString($id);
        if(session()->get('userData')['level']==0 || session()->get('userData')['level']==1|| session()->get('userData')['level']==2){
            $products = Product::with('getstore')->get();
        } else if(session()->get('userData')['level']==3){
            $products = Product::with('getstore')->where(['created_user'=>auth()->user()->id,'id_toko'=>$idToko])->get();
        } 
        $siteSetting = $this->siteSetting;
        return view('pages.admin.produk',compact('products','idToko','siteSetting'));
    }

    public function storeProduct()
    {
        $insData = [
            'product_name'=>request('product_name'),
            'price'=>request('price'),
            'description'=>request('description'),
            'active'=>request('active'),
            'image'=>request('image'),
            'id_toko'=>request('id_toko'),
            'active'=>'1',
            "created_user"=>auth()->user()->id
        ];
        // dd($insData);
        // 'store_banner','store_logo'

        $storeBanner = request()->file('image');
        $dir = 'store/product/';
        $fileName = Str::random(15).".".$storeBanner->getClientOriginalExtension();
        $storeBanner->move($dir,$fileName);
        $insData['image']=$dir.$fileName;
        
        $insSts = Product::create($insData);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Tambah Produk ".($insSts?'Berhasil':'Gagal')]);
    }
}
