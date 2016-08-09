<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tinh;
use Request;
use Flash;
use App\Http\Requests\ProviceRequest;
class ProvinceController extends Controller
{
    public function getIndex()
    {

        $province = Tinh::orderBy('id', 'desc')->paginate(10);
       // var_dump($province);exit();
        return view('admin.province.index', compact('province'));
    }

    /**Display from create province
     * @return response php artisan make:controller YeuCauController
     */

    public function getCreate()
    {
        return view('admin.province.add');
    }

    /**Method handle create province
     *@param Request $request
     */
    public function postCreate(ProviceRequest $request)
    {
       
        $province = new Tinh();
        $province->name = Request::get('name');
        //Create Province
        if($province->save()){
            Flash::success('Thêm thành công!');
        }else{
            Flash::error('Có lỗi trong quá trình thêm!');
        }
        return redirect('dashboard/province');
    }
    public function getEdit($id)
    {
        $cates = Tinh::find($id);
        return view('admin.province.edit', compact('cates'));
    }
    /**
     * Update data
     * @param  $id
     * @param  Request $request
     * @return Response
     */
    public function postEdit($id, Request $request)
    {
        $province = Tinh::find($id);
        $province->name = Request::input('name');
        //Update Cates
        if($province->save()){
            Flash::success('Sửa thành công!');
        }else{
            Flash::error('Có lỗi trong quá trình sửa!');
        }
        return redirect('dashboard/province');
    }

    /**
     * Delete cates
     * param $id
     */
    public function getDelete($id)
    {
        $province = Tinh::find($id);
        if($province->delete()){
            Flash::success('Xóa thành công!');
        }else{
           Flash::success('Có lỗi trong quá trình thực hiện!'); 
        }
        return redirect('dashboard/province');
    }
}
