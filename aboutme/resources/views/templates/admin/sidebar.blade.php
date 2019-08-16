<ul class="nav">
  <li class ="{{-- {{(request()->is('admin/danhmuc/*')) ? 'active' : '' }} --}}">
    <a href="">
      <i class="ti-map"></i>
      <p>Quan li bai viet</p>
      </a>
      <ul>
      	<li class="{{(request()->is('admin/danhmuc/*')) ? 'active' : '' }}"><a href="{{route('admin.danhmuc.index')}}" title="">Danh mục</a> </li>
      	<li class="{{(request()->is('admin/tintuc/*')) ? 'active' : '' }}"><a href="{{route('admin.tintuc.index')}}" title="">Tin tuc</a> 
          
          @if($count>0)
          <span class = "bagde abc123">
          {{$count}}</span>
          @else
          <span class = "bagde abc123"></span>
        @endif
       
      </li>
      	<li class="{{(request()->is('admin/comment/*')) ? 'active' : '' }}"><a href="{{route('admin.comment.index')}}" title="">Binh luan</a> </li>
      </ul>
    
  </li>
  <li class ="{{(request()->is('admin/story/*')) ? 'active' : '' }}">
    <a href="">
      <i class="ti-view-list-alt"></i>
      <p class="nameAdmin">Quan li thong tin</p>
    </a>
    <ul>
      	<li class="{{(request()->is('admin/thongtin/*')) ? 'active' : '' }}"><a href="{{route('admin.thongtin.index')}}" title="">Thong tin</a> </li>
      	<li class="{{(request()->is('admin/kinang/*')) ? 'active' : '' }}"><a href="{{route('admin.kinang.index')}}" title="">Ki nang</a> </li>
      	<li class="{{(request()->is('admin/duan/*')) ? 'active' : '' }}"><a href="{{route('admin.duan.index')}}" title="">Du an</a> </li>
      	<li class="{{(request()->is('admin/changduong/*')) ? 'active' : '' }}"><a href="{{route('admin.changduong.index')}}" title="">Chang duong</a> </li>
      </ul>
  </li>
  <li class ="{{(request()->is('admin/lienhe/*')) ? 'active' : '' }}">
    <a href="{{route('admin.lienhe.index')}}">
      <i class="ti-panel"></i>
      <p>Danh sách liên hệ</p>
    </a>
  </li>
  <li class ="{{(request()->is('admin/user/*')) ? 'active' : '' }}">
    <a href="{{route('admin.user.index')}}">
      <i class="ti-user"></i>
      <p>Danh sách người dùng</p>
    </a>
  </li>
</ul>
<style type="text/css" media="screen">
    .active {
      background-color: #7C9AFD;
    }
    .bagde {
      display: inline-block;
      min-width: 10px;
      padding: 3px 7px;
      font-size: 12px;
      font-weight: bold;
      line-height: 1;
      color: #fff;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      background-color: #FF5656;
      border-radius: 10px;
    }
  
</style>