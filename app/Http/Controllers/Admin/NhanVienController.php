<?php

namespace App\Http\Controllers\Admin;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
use App\Models\User;
use App\Models\Tinh;
use App\Models\Power;
use App\Http\Requests\StaffRequest;
use Request;
use Flash;
class NhanVienController extends Controller
{
    public function getIndex()
    {
        $staff = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.staff.index', compact('staff'));
    }
    //--------------------------------------------------------------
    public function getCreate()
    {
    	$province = Tinh::orderBy('id', 'desc')->get();
        return view('admin.staff.add',compact('province'));
    }
    //--------------------------------------------------------------
    public function postCreate(StaffRequest $request)
    {
	
        $user = new User();
        $user->hoten = Request::get('hoten');
        $user->ngaysinh = Request::get('ngaysinh');
        $user->gioitinh = Request::get('gioitinh');
        $user->diachi = Request::get('diachi');
        $user->email = Request::get('email');
        $user->matinh = Request::get('tinh');
        $user->matkhau = Request::get('matkhau');
        $user->sdt = Request::get('sdt');
       if($user->save()){
		foreach(Request::get('power') as $powers) {
		   $power = new Power();
  		   $power->iduser=$user->id;
		   $power->idtinh=$powers;
		   $power->save();
		}
		Flash::success('Đăng Ký thành công!');
       }else{
           Flash::error('Có lỗi trong quá trình đăng ký!');
       }
       return redirect('dashboard/staff/create');
      
        
    }
    //--------------------------------------------------------------
    public function getEdit($id)
    {
        $staff = User::find($id);
        $province = Tinh::orderBy('id', 'desc')->get();
        $power = Power::where('iduser',$id);
        return view('admin.staff.edit', compact('staff','province','power'));
    }
    //--------------------------------------------------------------
    public function postEdit($id, Request $request)
    {
        $staff = User::find($id);
        $staff->hoten = Request::get('hoten');
        $staff->ngaysinh = Request::get('ngaysinh');
        $staff->gioitinh = Request::get('gioitinh');
        $staff->diachi = Request::get('diachi');
        $staff->email = Request::get('email');
        $staff->matinh = Request::get('tinh');
        $staff->matkhau = Request::get('matkhau');
        $staff->sdt = Request::get('sdt');
        if($staff->save()){
            $powerss = Power::where('iduser',$id);
	    $powerss->delete();
	    foreach(Request::get('power') as $powers) {
		   $power = new Power();
  		   $power->iduser=$id;
		   $power->idtinh=$powers;
		   $power->save();
		}
            Flash::success('Sửa thành công!');
        }else{
            Flash::error('Có lỗi trong quá trình sửa!');
        }
        return redirect('dashboard/staff');
    }
    //--------------------------------------------------------------
    public function getDelete($id)
    {
        $staff = User::find($id);
        if($staff->delete()){
            $power = Power::where('iduser',$id);
	    $power->delete();
            Flash::success('Xóa thành công!');
        }else{
           Flash::success('Có lỗi trong quá trình thực hiện!'); 
        }
        return redirect('dashboard/staff');
    }
}
