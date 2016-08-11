<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Session;
use Flash;
use App\Models\InfoLink;
use App\Models\TokenModel;
use Request;
use Validator;
class UserController extends Controller
{
    public function getLogin()
    {
    	return view('auth.login');
    }
    public function postLogin(UserRequest $request)
    {
    	$email = $request->input('email');
    	$matkhau = $request->input('matkhau');
    	$count = \App\User::where('email',$email )->where('matkhau',$matkhau)->count();
    	if($count>0)
    	{ 
    		session(['email' => $email]);
    		return redirect('dashboard/result');
    	}
    	else
    	{
            Flash::error('Đăng nhập không thành công');
    		return redirect('/login');
   	    }
    }
    public function getCreate()
    {
        return view('admin.user.add');
    }
    public function postCreate(Request $request)
    {
        $link = new InfoLink();
        $link->url = Request::get('urlfrom');
        $link->urkfake = Request::get('urlto');
        $classObj = new TokenModel();
        $access_token = $classObj->getToken(30);
        $count = 0;
        $link->access_token =  $access_token;
       if($link->save()){
             Flash::success('Đăng Ký thành công!');
        }else{
           Flash::error('Có lỗi trong quá trình đăng ký!');
       }
       return redirect('dashboard/tracking/create');
    }
//----------------------------------------------------------------------------------------------
    public function getLogout()
    {
    	Session::flush();
        return redirect('/login');
    }

    public function getIndex()
    {
        $user = \App\User::paginate(5);
        return view('admin.user.index',compact('user'));
    }
}
