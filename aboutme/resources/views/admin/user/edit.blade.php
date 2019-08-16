@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Sửa người dùng</h4>
                </div>
                <div class= "alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red; list-style: none">{{$error}}</li>    
                @endforeach
                
            </ul>
        </div>
                <div class="content">
                    <form action="{{route('admin.user.edit',$user->id_users)}}" method="post">
                        @csrf
                        @php
                        //dd($user->id_users)
                        @endphp
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>UserName</label>
                                    <input type="text" name="username" class="form-control border-input" placeholder="Họ tên" value="{{$user->username}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date">FullName</label>
                                    <input type="text" name="fullname" value="{{$user->fullname}}" class="form-control border-input" placeholder="Tên đầy đủ">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="read">Password</label>
                                    <input type="password" name="password" value="" class="form-control border-input" placeholder="Mật khẩu" >
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@stop
