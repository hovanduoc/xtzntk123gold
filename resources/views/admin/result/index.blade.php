@extends('admin.common.layout')
@section('title', 'Quản lý hệ thống link')
@section('content')
    <form action="" method="get">
        <div class="action-bar">
            <div class="btn-bar pull-left btn_add">
                <a href="{!! url('dashboard/tracking/create') !!}" class="btn btn-success">Thêm mới</a>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Quản lý hệ thống Link</div>
            @include('flash::message')
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped" style="margin-bottom:0;">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Url From</th>
                            <th>Url To</th>
                            <th>Transfer Url</th>   
                            <th>Count</th>
                            <th class="pull-right">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{str_limit($item['url'],50,100)}}</td>
                                <td>{{str_limit($item['urkfake'],50,50)}}<a href="{{$item['urkfake']}}" target="_blank">...</td>
                                <td><a href="http://localhost/cms/tracking/{{$item['access_token']}}" target="_blank">http://localhost/cms/tracking/{{$item['access_token']}}</a></td>
								<td>{{$item['count']}}</td>
                                <td> 
                                <a title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa link này !');" href="{!! url('dashboard/result/delete', $item['id']) !!}" class="btn-del btn btn-sm btn-icon btn-default btn-danger">
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
                   {!! $result->render() !!}
                </ul>
            </div>
        </div>
    </form>
@endsection