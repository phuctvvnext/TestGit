@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách bạn bè</h4>
                    
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

                    <a href="{{route('admin.lienhe.add')}}" class="addtop"><img src="/templates/admin/img/add.png" alt="" /> Thêm</a>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Noi dung</th>
                        <th>Chức năng</th>
                        </thead>
                        <tbody>
                        @foreach($listContact as $contactAll)
                        @php
                            $id = $contactAll->id_contact;
                            $name = $contactAll->fullname;
                            $slug = str_slug($name);
                            $email = $contactAll->email;
                            $phone = $contactAll->phone;
                            $noidung = $contactAll->content;
                        @endphp
                        <tr>
                            <td>{{$id}}</td>
                            <td>{{$name}}</td>
                            <td>{{$email}}</td>
                            <td>{{$phone}}</td>
                            <td>{{$noidung}}</td>
                            <td>
                                <a href="{{ route('admin.lienhe.edit',$id) }}"><img src="/templates/admin/img/edit.gif" alt="" />Phản hồi</a> &nbsp;||&nbsp;
                                <a href="{{route('admin.lienhe.del',$id)}}"><img src="/templates/admin/img/del.gif" alt="" /> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                        

                        </tbody>

                    </table>

                    <div class="text-center">
                        <ul class="pagination">
                           
                            {{$listContact->links()}}
    
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
