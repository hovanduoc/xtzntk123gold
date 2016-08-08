@extends('admin.common.layout')
@section('title', 'Sửa danh mục')
@section('content')
    <div class="row">
        <form class="form-horizontal" role="form" action="" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa danh mục</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Tiêu đề</label>
                            <div class="col-sm-5"><input type="text" name="name" id="name" class="form-control" value="{!! old('name', isset($cates) ? $cates['name'] : null) !!}" placeholder="Tiêu đề danh mục"></div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <input type="submit" class="btn btn-primary" value="Cập nhật">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection