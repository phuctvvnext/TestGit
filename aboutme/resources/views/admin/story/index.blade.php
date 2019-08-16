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

                    <a href="{{route('admin.tintuc.add')}}" class="addtop"><img src="/public/template/admin/img/add.png" alt="" /> Thêm</a>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Hình ảnh</th>
                        <th>Lượt đọc</th>
                        <th>Thể loại</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                        </thead>
                        <tbody>
                        @foreach($storyList as $listStory)
                        @php
                            $id = $listStory->id_news;
                            $name = $listStory->name;
                            $slug = str_slug($name);
                            $cat_id = $listStory->catname;
                            $counter = $listStory->count_number;
                            $image = $listStory->picture;
                            $active = $listStory->active;
                            //($image);
                            //dd($image);
                            //dd($listStory);
                        @endphp
                        <tr>
                            <td>{{$id}}</td>
                            <td><a href="">{{$name}}</a></td>
                            @if($image!='')
                            <td><img src="/public/images/{{$image}}" alt="" width="100px" /></td>
                            @else
                            <td><img src"" alt="" width="100px" /></td>
                            @endif
                            <td>{{$counter}}</td>
                            <td>{{$cat_id}}</td>
                            <td class = "item-{{$id}}">
                            
                                        @if($active==1)

                                        <a href="javascript:void(0)" onclick="xyLyTrangThai({{$id}},{{$active}}) "><img src="/public/files/icon/active1.gif" alt="" /></a>
                                            @else
                                        <a href="javascript:void(0)" onclick="xyLyTrangThai({{$id}},{{$active}})"><img src="/public/files/icon/deactive1.gif" alt="" /></a>
                                        @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.tintuc.edit',$id)}}"><img src="/public/template/admin/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                <a href="{{route('admin.tintuc.del',$id)}}"><img src="/public/template/admin/img/del.gif" alt="" /> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                        

                        </tbody>

                    </table>

                    <div class="text-center">
                        <ul class="pagination">
                           
                            {{$storyList->links()}}
    
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        
            function xyLyTrangThai(nid,isActive) {
                var url = '/admin/tintuc/index/'+nid+'/'+isActive;
                var tmp = ".item-"+nid;
               
               // alert(isActive);

            $.ajax({
                    url: url,
                    type: 'GET',
                    cache: false,
                    data: {
                        

                    },
                    
                    success: function(data){
                        tmp = ".item-"+nid;
                        //alert(data);
                        if(isActive == 1){
                            var ac = "<a id = 'ckeck' href='javascript:void(0)'  onclick='xyLyTrangThai("+nid+",0);'><img src='/public/files/icon/deactive1.gif' /></a>";
                            $(tmp).html(ac);

                        } else {
                            var uc = "<a id = 'ckeck' href='javascript:void(0)'   onclick='xyLyTrangThai("+nid+",1);''><img src='/public/files/icon/active1.gif'/></a>";
                            $(tmp).html(uc);
                        }
                        $('.abc123').html(data);
                        
                        
                        
                    
                    },
                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                
                });
                return false;
            } 
        
    </script>
@stop
