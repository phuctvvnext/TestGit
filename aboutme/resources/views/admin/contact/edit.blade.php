@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Phản hồi liên hệ</h4>
                </div>
                <div >
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red; list-style: none">{{$error}}</li>    
                @endforeach
                
            </ul>
        </div>
                <div class="content">
                    <form action="{{route('admin.lienhe.edit',$contactEdit->id_contact)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="id" class="form-control border-input" disabled value="{{$contactEdit->id_contact}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ho Ten</label>
                                    <input type="text" name="name" class="form-control border-input" placeholder="Họ tên" value="{{$contactEdit->fullname}}">
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <textarea rows="4" name="email" class="form-control border-input" placeholder="Mô tả tóm tắt về bạn của bạn">{{$contactEdit->email}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung phản hồi</label>
                                    <textarea rows="6" name="noidung" class="form-control border-input" placeholder="Nhập phản hồi"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('noidung');
                                    </script>
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
