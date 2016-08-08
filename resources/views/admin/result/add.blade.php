@extends('admin.common.layout')
@section('title', 'Thêm Link')
@section('content')
    <div class="row">
        <form class="form-horizontal" role="form" action="" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm Link</div>
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
                            <label for="name" class="col-sm-2 control-label">Url From (Video)</label>
                            <div class="col-sm-5"><input type="text" name="urlfrom" id="urlfrom" class="form-control" value="{!! old('urlfrom') !!}" placeholder="Nhập Link"></div>
                        </div>
                         <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Url To </label>
                            <div class="col-sm-5"><input type="text" name="urlto" id="urlto" class="form-control" value="{!! old('urlto') !!}" placeholder="Nhập Link"></div>
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