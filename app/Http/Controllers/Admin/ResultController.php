<?php

namespace App\Http\Controllers\Admin;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\InfoLink;
use Flash;
use Session;
use DB;
class ResultController extends Controller
{

	/**
	* Display listing of resource
	*/
    public function getIndex()
    {
        // $result = InfoLink::orderBy('id', 'desc')->paginate(20);
        // return view('admin.result.index', compact('result'));
        return "123";
    }

    //--------------------------------------------------------------
    public function getDelete($id)
    {
        $staff = InfoLink::find($id);
        if($staff->delete()){
            Flash::success('Xóa thành công!');
        }else{
           Flash::success('Có lỗi trong quá trình thực hiện!'); 
        }
        return redirect('dashboard/result');
    }
}
