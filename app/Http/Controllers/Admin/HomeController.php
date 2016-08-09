<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRequest;
use App\Models\YeuCau;
use Request;
use Flash;
use DB;


// use App\Models\YeuCau;
// use Flash;

class HomeController extends Controller
{
     public function getIndex()
    {
        return view('fontend.index');
    }
    public function getRegister()
    {
    	$tinh = DB::table('tinh')->get();
    	return view('fontend.index',compact('tinh'));
    }
    public function postRegister(HomeRequest $request)
    {
           $yeucau = new YeuCau();
           $yeucau->hoten = Request::get('hoten');
           $yeucau->sdt = Request::get('sdt');
           $yeucau->socmnd = Request::get('scmnd');
           $yeucau->matinh = Request::get('tinh');
           $yeucau->hinhthucvay = Request::get('hinhthucvay');
           $checkcmnd = YeuCau::where('socmnd',Request::get('scmnd'))->count();
           if($checkcmnd>0)
           {
		   Flash::error('Số CMND đã được đăng ký !');
                   return redirect('home');
           }
           else{
	        if($yeucau->save()){
		       Flash::success('Đăng Ký thành công!');
		   }else{
		       Flash::error('Có lỗi trong quá trình đăng ký!');
		   }
		   return redirect('home');
	   }
    }
}
