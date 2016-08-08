@extends('admin.common.layout')
@section('title', 'Cập Nhật Thông Tin Nhân Viên')
@section('content')
    <div class="row">
        <form class="form-horizontal" role="form" action="" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cập Nhật Thông Tin Nhân Viên</div>
                    @include('flash::message')
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label" style=" text-align: left; ">Họ Và Tên</label>
                            <div class="col-sm-5"><input type="text" name="hoten" id="hoten" class="form-control" value="{!! old('hoten', isset($staff) ? $staff['hoten'] : null) !!}" placeholder="Họ Và Tên"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label" style=" text-align: left; ">Ngày Sinh</label>
                            <div class="col-sm-5"><input type="text" name="ngaysinh" id="ngaysinh" class="form-control" value="{!! old('ngaysinh', isset($staff) ? $staff['ngaysinh'] : null) !!}" placeholder="Ngày Sinh (VD : 30-05-1993)"></div>
                        </div>
                        <div class="form-group">
                            <label for="sel3" class="col-sm-2 control-label" style=" text-align: left; ">Giới Tính</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm" id="gioitinh" name="gioitinh">
                                    <option value="{!! old('gioitinh', isset($gioitinh) ? $staff['gioitinh'] : null) !!}">Chọn Giới</option>
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label" style=" text-align: left; ">Địa Chỉ</label>
                            <div class="col-sm-5"><input type="text" name="diachi" id="diachi" class="form-control" value="{!! old('diachi', isset($staff) ? $staff['diachi'] : null) !!}" placeholder="Địa Ch"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label" style=" text-align: left; ">Email</label>
                            <div class="col-sm-5"><input type="text" name="email" id="email" class="form-control" value="{!! old('email', isset($staff) ? $staff['email'] : null) !!}" placeholder="Email (VD : hovanduoc@gmail.com)"></div>
                        </div>
                        <div class="form-group">
                            <label for="sel3" class="col-sm-2 control-label" style=" text-align: left; ">Tỉnh / TP</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm" id="tinh" name="tinh">
                                    <option value="{!! old('tinh', isset($staff) ? $staff['tinh'] : null) !!}">Chọn Tỉnh / TP</option>
                                    @foreach($province as $item)
<?php
$check = DB::table('user')->where('matinh',$item->id)->where('id',$staff['id'])->count();

?>
                   <option value="{{ $item->id }}" @if($check>0){echo selected }@endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label" style=" text-align: left; ">Số  Điện Thoại</label>
                            <div class="col-sm-5"><input type="text" name="sdt" id="sdt" class="form-control" value="{!! old('sdt', isset($staff) ? $staff['sdt'] : null) !!}" placeholder="Số  Điện Thoại"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label" style=" text-align: left; ">Mật Khẩu</label>
                            <div class="col-sm-5"><input type="password" name="matkhau" id="matkhau" class="form-control" value="{!! old('matkhau', isset($staff) ? $staff['matkhau'] : null) !!}" placeholder="Mật Khẩu"></div>
                        </div>
			<div class="form-group">
                            <label for="name" class="col-sm-2 control-label" style=" text-align: left; ">Chọn Khu Vực Tỉnh</label>
                            <div class="col-sm-6">
				@foreach($province as $item)
				   <div class="col-md-4 col-sm-4">
                                        <?php
						$check = DB::table('power')->where('idtinh',$item->id)->where('iduser',$staff['id'])->count();
             
                                        ?>
				   	<input type="checkbox" name="power[]" value="{{ $item->id }}" @if($check>0){echo checked }@endif>{{ $item->name }}
				   </div>
				@endforeach
 			    </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <input type="submit" class="btn btn-primary" value="Thêm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
