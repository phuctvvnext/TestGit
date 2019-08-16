@extends('templates.aboutme.master')
@section('main-content')
	<div class="content">
			<div id="blog" class="blogdt">
				<div class="news_detail">
					<h1>Gia Huy dự thi "Tài năng lập trình trẻ 2016"</h1>
					<p class="date">Ngày đăng: 12/1/2016 - Lượt đọc: 123</p>
					<div class="news_content">
						<p>Theo một số phân tích tâm lý, dường như có một sự thật là các lập trình viên giỏi nhất thường có một động lực thúc đẩy từ bên trong. Điều này nghĩa là họ có được động lực và sự hài lòng từ quá trình tìm kiếm giải pháp cho một vấn đề, hoặc tạo ra một sáng tạo của riêng mình. Nói cách khác, các lập trình viên thường làm những gì họ yêu thích, thay vì chỉ làm điều đó vì tiền.</p>
						<p>Điều này là khá rõ ràng, nhưng cũng đáng để nhắc lại nếu bạn muốn làm việc trong ngành công nghiệp phần mềm, bạn cần phải có một sự đánh giá cao về những khả năng tuyệt vời mà công nghệ mang đến cho thế giới. Bạn quan tâm và tìm cách khai thác tiềm năng của công nghệ, cho bất cứ công ty mà bạn muốn làm việc cùng, và đó là một dấu hiệu chắc chắn rằng bạn đang đi đúng hướng và sẽ thành công trong nghề lập trình.</p>
					</div>
				</div>
				
				<h4 class="relate">Tin liên quan</h4>
				<ul>
					<li>
						<div class="article">
							<h3><a href="news_detail.html" class="more">Gia Huy dự thi "Tài năng lập trình trẻ 2016"</a></h3>
							<p>
								Trang web báo chí Đà Nẵng, cập nhật những tin tức liên quan đến kinh tế, chính trị,  giải trí Việt Nam...								
							</p>
						</div>
						<div class="stats">
							<a href="http://vinaenter.edu.vn" class="more" target="_blank"><img src="{{$publicURL}}/images/project.jpg" alt="" /></a>
						</div>
					</li>
					<li>
						<div class="article">
							<h3><a href="news_detail.html" class="more">Gia Huy dự thi "Tài năng lập trình trẻ 2016"</a></h3>
							<p>
								Trang web báo chí Đà Nẵng, cập nhật những tin tức liên quan đến kinh tế, chính trị,  giải trí Việt Nam...								
							</p>
						</div>
						<div class="stats">
							<a href="http://vinaenter.edu.vn" class="more" target="_blank"><img src="{{$publicURL}}/images/project.jpg" alt="" /></a>
						</div>
					</li>
					<li class="last">
						<div class="article">
							<h3><a href="news_detail.html" class="more">Gia Huy dự thi "Tài năng lập trình trẻ 2016"</a></h3>
							<p>
								Trang web báo chí Đà Nẵng, cập nhật những tin tức liên quan đến kinh tế, chính trị,  giải trí Việt Nam...								
							</p>
						</div>
						<div class="stats">
							<a href="http://vinaenter.edu.vn" class="more" target="_blank"><img src="{{$publicURL}}/images/project.jpg" alt="" /></a>
						</div>
					</li>
				</ul>
			</div>
			
			<div id="sidebar">
				@include('template.aboutme.right_bar')
				<div class="awards">
					<h3>Quảng cáo</h3>
					<a href="#" class="first">
						<img src="{{$publicURL}}/images/hehocgi.png" alt="" />
					</a>
					<a href="#" class="first">
						<img src="{{$publicURL}}/images/java.png" alt="" />
					</a>
				</div>
			</div>
			
			
		</div>
@endsection