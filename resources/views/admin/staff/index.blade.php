@extends('admin.common.layout')
@section('title', 'Quản lý danh mục')
@section('content')
    <form action="" method="get">
        <div class="action-bar">
            <div class="btn-bar pull-left btn_add">
                <a href="{!! url('dashboard/staff/create') !!}" class="btn btn-success">Thêm mới</a>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Quản lý danh mục</div>
            @include('flash::message')
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped" style="margin-bottom:0;">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Họ Tên</th>
                            <th>Ngày Sinh</th>
                            <th>Giới Tính</th>
                            <th>Dịa Chỉ</th>
                            <th>Email</th>
                            <th>Tỉnh</th>
                            <th>SDT</th>
                            <th class="pull-right">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($staff as $item)
                            <tr>
                                <td>
                                    <a href="{!! url('dashboard/staff/edit', $item['id']) !!}">{!! $item['id'] !!}</a>
                                </td>
                                 <td>
                                    {!! $item['hoten'] !!}
                                </td>
                                 <td>
                                     {!! $item['ngaysinh'] !!}
                                </td>
                                 <td>
                                   {!! $item['gioitinh'] !!}
                                </td>
                                 <td>
                                    {!! $item['diachi'] !!}
                                </td>
                                 <td>
                                   {!! $item['email'] !!}
                                </td>
                                 <td>
                                   {!! $item['matinh'] !!}
                                </td>
                                 <td>
                                    {!! $item['sdt'] !!}
                                </td>
                                <td class="pull-right">
                                    <a href="{!! url('dashboard/staff/edit', $item['id']) !!}" class="btn btn-sm btn-icon btn-default btn-info" title="Sửa">
                                        <i class="fa fa-pencil-square-o"></i>&nbsp; Sửa
                                    </a>
                                    <a title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa tỉnh mục {!! $item['name'] !!} !');" href="{!! url('dashboard/staff/delete', $item['id']) !!}" class="btn-del btn btn-sm btn-icon btn-default btn-danger">
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
                   {!! $staff->render() !!}
                </ul>
            </div>
        </div>
    </form>
@endsection