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
use App\Models\News;
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
        $news = News::limit(10)->orderBy('created_at')->get();
        return view('pages.guest.landingpage',compact('banner','activity','rt','testimoni','product','siteSetting','news'));
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
        return redirect()->back()->with(["error"=>!$updSts,"message"=>"Ubah Aktifitas ".($updSts?'Berhasil':'Gagal')]);
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
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);
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
            "update_user"=>auth()->user()->id
        ];
        $updSts = DashboardTestimoni::where(["id"=>request('id')])->update($updData);
        return redirect()->back()->with(["error"=>!$updSts,"message"=>"Ubah Testimoni ".($updSts?'Berhasil':'Gagal')]);
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
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);
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

    public function updStore()
    {
        $updData = [
            'store_name'=>request('store_name'),
            'address'=>request('address'),
            'description'=>request('description'),
            'phone'=>request('phone'),
            'whatsapp_sts'=>request('whatsapp_sts'),
            "update_user"=>auth()->user()->id
        ];
        // dd($updData);
        // 'store_banner','store_logo'

        $storeBanner = request()->file('store_banner');
        if($storeBanner!=null){
            $dir = 'store/banner/';
            $fileName = Str::random(15).".".$storeBanner->getClientOriginalExtension();
            $storeBanner->move($dir,$fileName);
            $updData['store_banner']=$dir.$fileName;
        }

        $storeLogo = request()->file('store_logo');
        if($storeLogo!=null){
            $dir = 'store/banner/';
            $fileName = Str::random(15).".".$storeLogo->getClientOriginalExtension();
            $storeLogo->move($dir,$fileName);
            $updData['store_logo']=$dir.$fileName;
        }
        
        $insSts = Store::where(['id'=>request('id')])->update($updData);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Update Toko ".($insSts?'Berhasil':'Gagal')]);
    }

    public function productPage($id)
    {
        $idToko = Crypt::decryptString($id);
        $dataToko = Store::where(["id"=>$idToko])->first();
        if(session()->get('userData')['level']==0 || session()->get('userData')['level']==1|| session()->get('userData')['level']==2){
            $products = Product::with('getstore')->where(['id_toko'=>$idToko])->get();
        } else if(session()->get('userData')['level']==3){
            $products = Product::with('getstore')->where(['created_user'=>auth()->user()->id,'id_toko'=>$idToko])->get();
        } 
        $siteSetting = $this->siteSetting;
        return view('pages.admin.produk',compact('products','idToko','siteSetting','dataToko'));
    }

    public function guestProductPage($id)
    {
        $idToko = Crypt::decryptString($id);
        $dataToko = Store::where(["id"=>$idToko])->first();
        if((session()->get('userData')['level']??'')==0 || (session()->get('userData')['level']??'')==1|| (session()->get('userData')['level']??'')==2){
            $products = Product::with('getstore')->get();
        } else if((session()->get('userData')['level']??'')==3){
            $products = Product::with('getstore')->where(['created_user'=>auth()->user()->id,'id_toko'=>$idToko])->get();
        } 
        $siteSetting = $this->siteSetting;
        return view('pages.guest.store',compact('products','idToko','siteSetting','dataToko'));
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

    public function updProduct()
    {
        $insData = [
            'product_name'=>request('product_name'),
            'price'=>request('price'),
            'description'=>request('description'),
            'active'=>request('active'),
            'id_toko'=>request('id_toko'),
            'active'=>'1',
            "updated_user"=>auth()->user()->id
        ];
        // dd($insData);
        // 'store_banner','store_logo'

        $storeBanner = request()->file('image');
        if($storeBanner!=null){
            $dir = 'store/product/';
            $fileName = Str::random(15).".".$storeBanner->getClientOriginalExtension();
            $storeBanner->move($dir,$fileName);
            $insData['image']=$dir.$fileName;
        }
        
        $insSts = Product::where('id',request('id'))->update($insData);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Tambah Produk ".($insSts?'Berhasil':'Gagal')]);
    }

    public function products()
    {
        $products = Product::with('getstore')->where('product_name','like','%'.(request('name')??'').'%')->get()->toArray();
        $siteSetting = $this->siteSetting;
        $tokos=[];
        $name = request('name');
        if(request()->has('name'))$tokos = Store::where('store_name','like','%'.(request('name')??'').'%')->get()->toArray();
        return view('pages.guest.products',compact('products','siteSetting','tokos','name'));
    }

    public function jsonDetailToko($id)
    {
        $dataToko = Store::where(["id"=>Crypt::decryptString($id)])->first();
        return response()->json($dataToko);
    }

    public function delToko($id)
    {
        $dataToko = Store::where(["id"=>Crypt::decryptString($id)])->first();
        if(File::exists(public_path($dataToko->store_banner))){
            File::delete(public_path($dataToko->store_banner));
        }
        if(File::exists(public_path($dataToko->store_logo))){
            File::delete(public_path($dataToko->store_logo));
        }
        $dataProduct = Product::where('id_toko',$dataToko->id)->get();
        foreach($dataProduct as $item){
            $delProduct = Product::where(["id"=>$item->id])->first();
            if(File::exists(public_path($delProduct->image))){
                File::delete(public_path($delProduct->image));
            }
            Product::where(["id"=>$item->id])->delete();
        }
        Store::where(["id"=>Crypt::decryptString($id)])->delete();
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);
    }

    public function jsonDetailProduct($id)
    {
        $dataProduct = Product::where(["id"=>Crypt::decryptString($id)])->first();
        return response()->json($dataProduct);
    }

    public function delProduct($id)
    {
        $dataProduct = Product::where(["id"=>Crypt::decryptString($id)])->first();
        if(File::exists(public_path($dataProduct->image))){
            File::delete(public_path($dataProduct->image));
        }
        Product::where(["id"=>Crypt::decryptString($id)])->delete();
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);
    }

    public function newsPage()
    {
        $news = News::all();
        return view('pages.admin.news',compact('news'));
    }

    public function storeNews()
    {
        $insData = [
            "title"=>request('title'),
            "content"=>request('content'),
            "created_user"=>auth()->user()->id
        ];
        $newsImg = request()->file('news_banner');
        if($newsImg){
            $dir = 'news/';
            $fileName = Str::random(15).".".$newsImg->getClientOriginalExtension();
            $newsImg->move($dir,$fileName);
            $insData['news_banner']=$dir.$fileName;
        }
        $insSts = News::create($insData);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Tambah Aktifitas ".($insSts?'Berhasil':'Gagal')]);
    }

    public function jsonDetailNews($id)
    {
        $dataNews = News::where(["id"=>Crypt::decryptString($id)])->first();
        return response()->json($dataNews);
    }

    public function updNews()
    {
        $updData = [
            "title"=>request('title'),
            "content"=>request('content'),
            "updated_user"=>auth()->user()->id
        ];
        $newsImg = request()->file('news_banner');
        if($newsImg){
            $dir = 'news/';
            $fileName = Str::random(15).".".$newsImg->getClientOriginalExtension();
            $newsImg->move($dir,$fileName);
            $updData['news_banner']=$dir.$fileName;
        }
        $updSts = News::where('id',request('id'))->update($updData);
        return redirect()->back()->with(["error"=>!$updSts,"message"=>"Tambah Aktifitas ".($updSts?'Berhasil':'Gagal')]);
    }


    public function delNews($id)
    {
        $dataNews = News::where(["id"=>Crypt::decryptString($id)])->first();
        if(File::exists(public_path($dataNews->news_banner))){
            File::delete(public_path($dataNews->news_banner));
        }
        News::where(["id"=>Crypt::decryptString($id)])->delete();
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);;
    }

    public function newsDetail($id)
    {
        $page = true;
        $dataNews = News::where(["id"=>Crypt::decryptString($id)])->first();
        $title=$dataNews->title;
        $siteSetting = $this->siteSetting;
        return view('pages.guest.news',compact('dataNews','title','page','siteSetting'));
    }

    public function addBanner()
    {
        $insData = [
            "banner_for"=>'1',
            "created_user"=>auth()->user()->id
        ];
        $banner_src = request()->file('banner_src');
        if($banner_src){
            $dir = 'banner/';
            $fileName = Str::random(15).".".$banner_src->getClientOriginalExtension();
            $banner_src->move($dir,$fileName);
            $insData['banner_src']=$dir.$fileName;
        }
        $insSts = DashboardBanner::create($insData);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Tambah Banner ".($insSts?'Berhasil':'Gagal')]);
    }

    public function deleteBanner($id)
    {
        $dataDashboardBanner = DashboardBanner::where(["id"=>Crypt::decryptString($id)])->first();
        if(File::exists(public_path($dataDashboardBanner->banner_src))){
            File::delete(public_path($dataDashboardBanner->banner_src));
        }
        DashboardBanner::where(["id"=>Crypt::decryptString($id)])->delete();
        return redirect()->back()->with(["error"=>false,"message"=>"Delete Berhasil"]);;
    }
}
