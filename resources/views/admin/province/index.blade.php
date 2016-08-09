@extends('admin.common.layout')
@section('title', 'Quản lý danh mục')
@section('content')
    <form action="" method="get">
        <div class="action-bar">
            <div class="btn-bar pull-left btn_add">
                <a href="{!! url('dashboard/province/create') !!}" class="btn btn-success">Thêm mới</a>
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
                            <th>Tên tỉnh</th>
                            <th class="pull-right">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($province as $item)
                            <tr>
                                <td>
                                    <a href="{!! url('dashboard/province/edit', $item['id']) !!}">{!! $item['name'] !!}</a>
                                </td>
                                <td class="pull-right">
                                    <a href="{!! url('dashboard/province/edit', $item['id']) !!}" class="btn btn-sm btn-icon btn-default btn-info" title="Sửa">
                                        <i class="fa fa-pencil-square-o"></i>&nbsp; Sửa
                                    </a>
                                    <a title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa tỉnh mục {!! $item['name'] !!} !');" href="{!! url('dashboard/province/delete', $item['id']) !!}" class="btn-del btn btn-sm btn-icon btn-default btn-danger">
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
                   {!! $province->render() !!}
                </ul>
            </div>
        </div>
    </form>
@endsection