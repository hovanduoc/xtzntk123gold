<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vay tiền - Vay vốn ngân hàng nhanh thủ tục đơn giản nhất</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<div class="container">
    <div class="formdangky">
        <h3>
            ĐĂNG KÝ VAY TÍN CHẤP NGÂN HÀNG
        </h3>
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
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/home') }}">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('hoten') ? ' has-error' : '' }}">
                        <label for="inputdefault">Họ & tên (*)</label>
                        <input class="form-control" id="hoten" type="text" name="hoten" value="{{ old('hoten') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="inputdefault">Số điện thoại (*)</label>
                        <input class="form-control" id="sdt" type="text" name="sdt" value="{{ old('sdt') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="inputdefault">Số CMND (*)</label>
                        <input class="form-control" id="scmnd" type="text" name="scmnd" value="{{ old('scmnd') }}">
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                          <label for="inputdefault">Äá»‹a chá»‰</label>
                          <input class="form-control" id="diachi" type="text" name="diachi" value="{{ old('diachi') }}">
                      </div>
                  </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="sel3">Tỉnh / TP</label>
                        <select class="form-control input-sm" id="tinh" name="tinh">
                            <option value="{{ old('tinh') }}">Chọn Tỉnh/TP</option>
                            @foreach($tinh as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="sel3">Chọn Hình Thức Vay</label>
                        <select class="form-control input-sm" id="hinhthucvay" name="hinhthucvay">
                            <option value="{{ old('hinhthucvay') }}">Chọn Hình Thức Vay</option>
                            <option value="Vay Qua Lương">Vay Qua Lương</option>
                            <option value="Vay Bảo Hiểm Nhân Thọ">Vay Bảo Hiểm Nhân Thọ</option>
                            <option value="Vay Hóa Đơn Tiền Điện">Vay Hóa Đơn Tiền Điện</option>
                            <option value="Vay Mua Xe Trả Góp">Vay Mua Xe Trả Góp</option>
                            <option value="Vay Thế Chấp">Vay Thế Chấp</option>
                            <option value="Vay Theo Giấy Đăng Ký Xe">Vay Theo Giấy Đăng Ký Xe</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="sel3"></label>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Gởi Đăng Ký</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
