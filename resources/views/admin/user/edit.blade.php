@extends('admin.common.layout')
@section('title', 'Sửa thành viên')
@section('content')
    <div class="row">
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="form_data_user">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa thành viên</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Họ tên</label>
                            <div class="col-sm-5"><input type="text" name="title" id="title" class="form-control" value="{!! old('title', isset($user) ? $user['name'] : null) !!}" placeholder="Họ và tên"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Tên đăng nhập</label>
                            <div class="col-sm-5"><input type="text" name="username" id="username" class="form-control" value="{!! old('username', isset($user) ? $user['username'] : null) !!}" disabled></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-5"><input type="text" name="email" id="email" class="form-control" value="{!! old('email', isset($user) ? $user['email'] : null) !!}" placeholder="Email"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Mật khẩu</label>
                            <div class="col-sm-5"><input type="password" name="password" class="form-control" value="{!! old('password') !!}" placeholder="Mật khẩu"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                            <div class="col-sm-5"><input type="password" name="repassword" class="form-control" value="{!! old('repassword') !!}" placeholder="Nhập lại mật khẩu"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-2">
                                <div class="show_img_edit">
                                    <img style="height: 50px; width:50px" src="{!! url('public/upload', $user['images']) !!}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Hình ảnh:</label>
                            <div class="col-sm-5">
                                <div class="input-group image-preview">
                                    <input type="text" value="{!! url('public/upload', $user['images']) !!}" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
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
                        @if($user['level'] == 1)
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Phân quyền</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="is_level">
                                    @if($user['level'] == 1)
                                    <option value="0">Thành viên</option>
                                    <option value="1" selected>Quản trị</option>
                                        @else
                                        <option value="0" selected>Thành viên</option>
                                        <option value="1">Quản trị</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection