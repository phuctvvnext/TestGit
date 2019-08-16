@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách bạn bè</h4>
                    @if(Session::has('msg'))
                    <p class="category success">{{Session::get('msg')}}</p>
                    @endif
                    @if(Session::has('loi'))
                    <div class="alert alert-danger">{{Session::get('loi')}}</div>
                    @endif
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <input type="text" name="id" class="form-control border-input" value=""  placeholder="ID">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control border-input" placeholder="Họ tên" value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="friend_list" class="form-control border-input">
                                        <option value="0">-- Chọn danh mục --</option>
                                        <option value="1">Bạn quen thời phổ thông</option>
                                        <option>Bạn quen thời đại học</option>
                                        <option>Bạn tâm giao</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" name="search" value="Tìm kiếm" class="is" />
                                    <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
                                </div>
                            </div>
                        </div>

                    </form>

                    
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Hình ảnh</th>
                        <th>Lượt đọc</th>
                        
                        <th>Chức năng</th>
                        </thead>
                        <tbody>
                        @foreach($commentList as $listCM)
                        @php
                            $id = $listCM->id_cm;
                            $id_news = $listCM->id_news;
                            $name = $listCM->fullname;
                            //$slug = str_slug($name);
                            $content = $listCM->content;
                            
                            //($image);
                            //dd($image);
                            //dd($listCM);
                        @endphp
                        <tr>
                            <td>{{$id}}</td>
                            <td>{{$id_news}}</td>
                            
                            <td>{{$name}}</td>
                            <td>{{$content}}</td>
                            <td>
                                <a href="{{route('admin.comment.del',$id)}}"><img src="/public/templates/admin/img/del.gif" alt="" /> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                        

                        </tbody>

                    </table>

                    <div class="text-center">
                        <ul class="pagination">
                           
                            {{$commentList->links()}}
    
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
