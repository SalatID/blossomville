<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\LetterSubmision;
use App\Models\LetterSubmisionLog;
use App\Models\LetterType;
use App\Models\SiteSetting;
use App\Models\DashboardBanner;
use Str;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public $cnt = 0;
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

    public function getChartByGender()
    {
        return response()->json(User::selectRaw('count(*)total, gender')->groupBy('gender')->get());
    }

    public function getChartByGeneration()
    {
        $query ="select 
        case when year_birth <= 1945 then 'Pre-Boomer'
        when year_birth >= 1946 and year_birth<=1964 then 'Baby Boomer'
        when year_birth >= 1965 and year_birth<=1980 then 'Gen X' 
        when year_birth >= 1981 and year_birth<=1996 then 'Milenial'
        when year_birth >= 1997 and year_birth<=2012 then 'Gen Z'
        when year_birth >= 2013 and year_birth<=year(now()) then 'Post Gen Z'
        end as generation,
        sum(total)total
        from (
        select count(*) total,year(date_birth)year_birth
        from users
        group by year(date_birth)
        ) x
        group by generation";
        return response()->json(DB::select($query));
    }

    public function getChartByMarriage()
    {
        return response()->json(User::selectRaw('count(*)total, marriage')->groupBy('marriage')->get());
    }

    public function getTotalWargaByGender()
    {
        return response()->json(User::selectRaw("SUM(IF(gender='male',1,0)) male,SUM(IF(gender='female',1,0)) female,rt_no")->join('dbs_rt as a','a.id','users.id_rt')->groupBy('rt_no')->get());
    }

    public function siteSetting()
    {
        $siteData=  SiteSetting::first();
        $banner = DashboardBanner::all();
        return view('pages.admin.sitesetting',compact('siteData','banner'));
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
    public function letterSubmision()
    {
        $letterTypes = LetterType::where(['status'=>1])->get();
        $letterLog = LetterSubmision::select('letter_submision.*','a.full_name','b.rt_no','a.address','a.block','a.house_number')->with("getlettertype")
        ->join('users as a','a.id','letter_submision.letter_for')
        ->join('dbs_rt as b','b.id','a.id_rt');
        if(auth()->user()->level==0 || auth()->user()->level == 1){
            $letterLog=$letterLog->get();
            $dataWarga = User::where(['verified'=>1])->get();
        } else if (auth()->user()->level==2){
            $letterLog = $letterLog->where(['b.id_rt'=>auth()->user()->id_rt,'verified'=>1])->get();
            $dataWarga = User::where(['id_rt'=>auth()->user()->id_rt])->get();
        } else {
            $letterLog = $letterLog->where('letter_for',auth()->user()->id)->get();
            $dataWarga = User::where(['kk'=>auth()->user()->kk,'verified'=>1])->get();
        }
        // dd($letterLog);
        return view('pages.admin.ajukansurat',compact('letterLog','letterTypes','dataWarga'));
    }

    public function addLetterSubmision()
    {
        $array_bln = ["I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII"];
        $maxNo = LetterSubmision::where('letter_no','like','%RT.0'.request('id_rt').'%')->max(DB::raw('left(letter_no,3)+1'));
        // dd($maxNo);
        $insData = [
            'letter_no'=>sprintf('%03d',$maxNo??1).'/SK/RT.'.sprintf('%02d',request('id_rt')).'/'.$array_bln[date('n')].'/'.date('Y'),
            'letter_id'=>request('letter_id'),
            'status'=>'REQ',
            'letter_for'=>request('letter_for'),
            'created_user'=>auth()->user()->id
        ];
        $insSts = LetterSubmision::create($insData);
        LetterSubmisionLog::create([
            'sts_before'=>'REQ',
            'id_letter_submision'=>$insSts->id,
            'created_user'=>auth()->user()->id
        ]);
        return redirect()->back()->with(["error"=>!$insSts,"message"=>"Pengajuan Surat ".($insSts?'Berhasil':'Gagal')]);
    }

    public function printLetter($id_surat,$id_sumbision)
    {
        $dataSurat = LetterSubmision::select('letter_submision.*','a.full_name','b.rt_no','a.address','a.block','a.house_number','a.id_rt')->with(["getlettertype"=>function($query) use ($id_surat) {
            $query->select('letter_type.*')->where('letter_type.id',Crypt::decryptString($id_surat));
        }])
        ->join('users as a','a.id','letter_submision.letter_for')
        ->join('dbs_rt as b','b.id','a.id_rt')
        ->where('letter_submision.id',Crypt::decryptString($id_sumbision))
        ->first();
        // dd(date('Ymd',strtotime($dataSurat->created_at))!=date('Ymd'));
        if(date('Ymd',strtotime(($dataSurat->created_at??date('Ymd'))))!=date('Ymd')){
            // dd(date('Ymd',strtotime($dataSurat->created_at)));
            $array_bln = ["I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII"];
            $maxNo = LetterSubmision::where('letter_no','like','%RT.0'.$dataSurat->id_rt.'%')->max(DB::raw('left(letter_no,3)+1'));
            $insData = [
                'letter_no'=>sprintf('%03d',$maxNo??1).'/SK/RT.'.sprintf('%02d',$dataSurat->id_rt).'/'.$array_bln[date('n')].'/'.date('Y'),
                'letter_id'=>$dataSurat->letter_id,
                'status'=>'REQ',
                'letter_for'=>$dataSurat->letter_for,
                'created_user'=>auth()->user()->id
            ];
            $insSts = LetterSubmision::create($insData);
            LetterSubmisionLog::create([
                'sts_before'=>'REQ',
                'id_letter_submision'=>$insSts->id,
                'created_user'=>auth()->user()->id
            ]);
            LetterSubmisionLog::create([
                'sts_before'=>'REQ',
                'sts_after'=>'PRN',
                'id_letter_submision'=>$insSts->id,
                'created_user'=>auth()->user()->id
            ]);
            return $this->printLetter($id_surat,Crypt::encryptString($insSts->id));
        }
        LetterSubmision::where('letter_submision.id',Crypt::decryptString($id_sumbision))->update(['status'=>'PRN']);
        if(!LetterSubmisionLog::where(['id_letter_submision'=>Crypt::decryptString($id_sumbision),'sts_after'=>'PRN'])->exists()){
            LetterSubmisionLog::create([
                'sts_before'=>'REQ',
                'sts_after'=>'PRN',
                'id_letter_submision'=>Crypt::decryptString($id_sumbision),
                'created_user'=>auth()->user()->id
            ]);
        }
        $pdf = PDF::loadView('pages.admin.print.suratketerangan', compact('dataSurat'))->setPaper('a4');
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
        return view('pages.admin.print.suratketerangan',compact('dataSurat'));
    }
}
