@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Thêm lien he</h4>
                </div>
                <div class= "">
            <ul>
                @if(isset($errors))
                @foreach($errors->all() as $error)
                    <div class= "alert alert-danger">
                    <li style="color: black; list-style: none">{{$error}}</li>
                    </div>    
                @endforeach
                @endif
                
            </ul>
        </div>
                <div class="content">
                    <form action="{{route('admin.lienhe.add')}}" method="post">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control border-input" placeholder="Họ tên" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date">Email</label>
                                    <input type="text" name="email" value="" class="form-control border-input" placeholder="Tên đầy đủ">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date">Website</label>
                                    <input type="text" name="website" value="" class="form-control border-input" placeholder="Tên đầy đủ">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Noi dung</label>
                                    <textarea rows="4" name="noidung" class="form-control border-input" placeholder="Mô tả tóm tắt về bạn của bạn"></textarea>
                                </div>
                                <script type="text/javascript">
                                    CKEDITOR.replace('noidung');
                                </script>
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
