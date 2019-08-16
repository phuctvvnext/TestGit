@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Sửa người dùng</h4>
                </div>
                <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red; list-style: none">{{$error}}</li>    
                @endforeach
                
            </ul>
        </div>
                <div class="content">
                    <form action="{{route('admin.changduong.add')}}" method="post">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control border-input" placeholder="Họ tên" value="">
                                </div>
                            </div>

                            

                        </div>
                        <div class="row">
                        	
                        
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Phân loại</label>
                                    <select name="phanloai" class="form-control border-input">
                                        
                                        <option value="hoctap">Hoc tap</option>
                                        <option value="hoctap">Kinh nghiem</option>

                                        
                                    </select>
                                </div>
                            </div>
                            </div>
                           <div class="row">
                           	
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thoi gian</label>
                                    <input type="text" name="thoigian" class="form-control border-input" placeholder="Họ tên" value="">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                           	
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Noi dung</label>
                                    <input type="text" name="noidung" class="form-control border-input" placeholder="Họ tên" value="">
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
