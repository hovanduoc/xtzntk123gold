@extends('admin.common.layout')
@section('title', 'Thêm thành viên')
@section('content')
    <div class="row">
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="form_data_user">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm thành viên</div>
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
                            <label for="name" class="col-sm-2 control-label">Họ tên</label>
                            <div class="col-sm-5"><input type="text" name="title" id="title" class="form-control" value="{!! old('title') !!}" placeholder="Họ và tên"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Tên đăng nhập</label>
                            <div class="col-sm-5"><input type="text" name="username" id="username" class="form-control" value="{!! old('username') !!}" placeholder="Tên đăng nhập"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-5"><input type="text" name="email" id="email" class="form-control" value="{!! old('email') !!}" placeholder="Email"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Mật khẩu</label>
                            <div class="col-sm-5"><input type="password" name="password" id="password" class="form-control" value="{!! old('password') !!}" placeholder="Mật khẩu"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                            <div class="col-sm-5"><input type="password" name="repassword" id="repassword" class="form-control" value="{!! old('repassword') !!}" placeholder="Nhập lại mật khẩu"></div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Hình ảnh:</label>
                            <div class="col-sm-5">
                                <div class="input-group image-preview">
                                    <input type="text" value="" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                        <!-- image-preview-input -->
                                        <div class="btn btn-default image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Chọn ảnh</span>
                                            <input type="file" id="upload-submit" name="fimage"/>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Phân quyền</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="is_level">
                                    <option value="0">Thành viên</option>
                                    <option value="1">Quản trị</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <button type="button" onclick="products_validate_user()" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection