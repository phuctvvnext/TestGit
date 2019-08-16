@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Đăng nhập</h4>
                </div>
                <div class="content">
                	@if(Session::has('msg'))
                		{{Session::get('msg')}}
                	@endif
                    <form action="{{route('auth.auth.login')}}" method="post">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>UserName</label>
                                    <input type="text" name="username" class="form-control border-input" placeholder="Họ tên" value="">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="read">Password</label>
                                    <input type="password" name="password" value="" class="form-control border-input" placeholder="Mật khẩu">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-info btn-fill btn-wd" value="Đăng nhập" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@stop
