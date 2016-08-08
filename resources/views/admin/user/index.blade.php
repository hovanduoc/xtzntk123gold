@extends('admin.common.layout')
@section('title', 'Quản lý thành viên')
@section('content')
    <form action="" method="get">
        <div class="action-bar">
            <div class="btn-bar pull-left btn_add">
                <a href="{!! url('dashboard/user/create') !!}" class="btn btn-success">Thêm mới</a>
            </div>
            <div class="search pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" name="s" placeholder="Nhập nội dung tìm kiếm...">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Tìm</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Quản lý thành viên</div>
            @include('flash::message')
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped" style="margin-bottom:0;">
                        <thead>
                        <tr>
                            <th style="width: 10%;">Hình ảnh</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Quyền</th>
                            <th style="width: 15%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $item)
                            <tr>
                                <td>
                                    <img class="img_list_user" src="{!! url('public/upload', $item['images']) !!}" />
                                </td>
                                <td>
                                    <a href="{!! url('dashboard/user/edit', $item['id']) !!}">{!! $item['username'] !!}</a>
                                </td>
                                <td>
                                    <a href="{!! url('dashboard/user/edit', $item['id']) !!}">{!! $item['email'] !!}</a>
                                </td>
                                <td>
                                    @if($item['level'] == 1)
                                        <span class="label-success label label-default">Quản trị</span>
                                    @else
                                        <span class="label label-default">Thành viên</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{!! url('dashboard/user/edit', $item['id']) !!}" class="btn btn-sm btn-icon btn-default btn-info" title="Sửa">
                                        <i class="fa fa-pencil-square-o"></i>&nbsp; Sửa
                                    </a>
                                    <a title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa!');" href="{!! url('dashboard/user/delete', $item['id']) !!}" class="btn-del btn btn-sm btn-icon btn-default btn-danger">
                                        <i class="fa fa-trash"></i>&nbsp; Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <ul class="pagination list-inline">
                    {!! $user->render() !!}
                </ul>
            </div>
        </div>
    </form>
@endsection