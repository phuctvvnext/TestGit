@extends('templates.aboutme.master')
@section('main-content')
	<div class="content">
			<div id="section">
				<h2>Liên hệ với Gia Huy</h2>
				<img src="{{$publicURL}}/images/chung.png" alt="" width="100%" />
				<form action="index.html">
					<b>Gửi liên hệ trực tuyển</b> 
					<span>Vui lòng điền đầy đủ thông tin để liên hệ trực tuyến đến Gia Huy. Tôi sẽ phản hồi sớm nhất có thể!</span>
					<input type="text" name="name" id="name" value="" placeholder="Họ và tên" />
					<input type="text" name="email" id="email" value=""  placeholder="Email" />
					<input type="text" name="address" id="address" value=""  placeholder="Địa chỉ" />
					<input type="text" name="phone" id="phone" value=""  placeholder="Số phone" />
					<textarea name="message" id="message" cols="30" rows="10" placeholder="Nội dung"></textarea>
					<input type="submit" name="send" id="send" value="Gửi liên hệ">
				</form>
			</div>
			
			<div id="sidebar">
				@include('template.aboutme.right_bar')
			</div>
			
		</div>
@endsection