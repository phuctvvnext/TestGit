@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Them truyen</h4>
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
                    <form action="{{route('admin.tintuc.add')}}" method="post" enctype="multipart/form-data">
                    	@csrf
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên truyện</label>
                                    <input type="text" name="name" class="form-control border-input" placeholder="Họ tên" value="">
                                </div>
                            </div>
                            
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Danh mục bạn bè</label>
                                    <select name="friendlist" class="form-control border-input">
                                        @foreach($listCatAdmin as $listCat)
                                        <option value="{{$listCat->id_cat}}">{{$listCat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" name="hinhanh" class="form-control" placeholder="Chọn ảnh" />
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea rows="4" name="mota" class="form-control border-input" placeholder="Mô tả tóm tắt về bạn của bạn"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chi tiết</label>
                                    <textarea rows="6" name="chitiet" class="form-control border-input" placeholder="Mô tả chi tiết về bạn của bạn"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('chitiet');
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@stop
