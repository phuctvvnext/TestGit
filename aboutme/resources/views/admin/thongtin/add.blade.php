@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Sửa thông tin</h4>
                </div>
                <div class= "">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red; list-style: none">{{$error}}</li>    
                @endforeach
                
            </ul>
        </div>
                <div class="content">
                    <form action="{{route('admin.thongtin.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên </label>
                                    <input type="text" name="name" class="form-control border-input" placeholder="Họ tên" value="">
                                </div>
                            </div>
                            
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <textarea rows="4" name = "phone" class="form-control border-input" placeholder="Mô tả tóm tắt về bạn của bạn"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ngay sinh</label>
                                    <textarea rows="4" name = "ngaysinh" class="form-control border-input" placeholder="Mô tả tóm tắt về bạn của bạn"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <textarea rows="4" name = "email" class="form-control border-input" placeholder="Mô tả tóm tắt về bạn của bạn"></textarea>
                                </div>
                            </div>
                        </div>
                        

                        

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dia chi</label>
                                    <textarea rows="4" name = "diachi" class="form-control border-input" placeholder="Mô tả tóm tắt về bạn của bạn"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chi tiết</label>
                                    <textarea rows="6" name = "chitiet" class="form-control border-input" placeholder="Mô tả chi tiết về bạn của bạn"></textarea>
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
