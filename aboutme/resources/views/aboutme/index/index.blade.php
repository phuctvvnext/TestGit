@extends('templates.aboutme.master')
@section('main-content')
        <div id="gioithieu">
            
        
	        <section class="home_banner_area">
            <div class="banner_inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="home_left_img">
								<img src="/public/images/tvp.jpg" alt="" width="360px" height="550px">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="banner_content">
								<h5>Web developer</h5>
								<h2>Trần Văn Phúc</h2>
								<p>CHÀO MỪNG CÁC BẠN ĐẾN VỚI TRANG WEB CỦA MÌNH</p>
								<a class="banner_btn" href="/download">Download CV</a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        </div>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <div class="about" id="about">
        	
        
        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>Thông tin</h4>
                            @foreach($info_banthan as $info)
        					<p>{{$info->detail}}</p>
                            @endforeach
        					<div class="row">
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-database"></i>
        								<h4>$2.5M</h4>
        								<p>Total Donation</p>
        							</div>
        						</div>
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-book"></i>
        								<h4>1465</h4>
        								<p>Total Projects</p>
        							</div>
        						</div>
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-users"></i>
        								<h4>3965</h4>
        								<p>Total Volunteers</p>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="tools_expert">
        					<h3>Kĩ năng</h3>
                            
        					<div class="skill_main">
                                @foreach($kinang_banthan as $kinang)
								<div class="skill_item">
									<h4>{{$kinang->name}} <span class="counter">{{$kinang->point}}</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="{{$kinang->point}}" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
                                @endforeach
								
							</div>

        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        </div>
        <!--================End Welcome Area =================-->
        
        <!--================Feature Area =================-->
        <div class = "duan" id="duan">
            
        
        <section class="feature_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Dự án</h2>
        			<p></p>
        		</div>
        		<div class="feature_inner row">
                    @foreach($duan_banthan as $duan)
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<i class="flaticon-city"></i>
        					<h4>{{$duan->name}}</h4>
                            <a href="{{$duan->link}}" title="">
        					   <img src="/public/images/{{$duan->image}}" alt="" style="width: 300px;height:170px;">
                            </a>
        				</div>
        			</div>
                    @endforeach
        			
        		</div>
        	</div>
        </section>
        </div>
        <!--================End Feature Area =================-->
        
        <!--================Projects Area =================-->
        <div id = "tincongnghe" class = "tincongnghe">
            
        
        <section class="projects_area p_120">
        	<div class="container">
        		<div class="main_title">
					<h2>Tin công nghệ</h2>
					<p></p>
				</div>
        		
				<div class="projects_inner row">
					@foreach($tintuc as $tt)
                    @php
                        $slug = str_slug($tt->name);
                        $id = $tt->id_news
                    @endphp
					<div class="col-lg-4 col-sm-6 brand work">
						<div class="projects_item">
							<img class="img-fluid" src="/public/images/{{$tt->picture}}" alt="" width="360px"
                            height="340px" style="width: 340px;height: 320px; opacity: 0.6;">
							<div class="projects_text">
								<a href="{{route('aboutme.news.detail',[$slug,$id])}}"><h4 style="color: #7A9CFE;">{{$tt->name}}</h4></a>
								<a href="" title=""><p>Chi tiết</p></a>
							</div>
						</div>
					</div>
                    @endforeach

					
				</div>
        	</div>
        </section>
        </div>
        <!--================End Projects Area =================-->
        
        <!--================Testimonials Area =================-->
        {{-- <section class="testimonials_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Testimonials</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="testi_inner">
					<div class="testi_slider owl-carousel">
						<div class="item">
							<div class="testi_item">
								<p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel across her face</p>
								<h4>Fanny Spencer</h4>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star-half-o"></i></a>
							</div>
						</div>
						<div class="item">
							<div class="testi_item">
								<p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel across her face</p>
								<h4>Fanny Spencer</h4>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star-half-o"></i></a>
							</div>
						</div>
						<div class="item">
							<div class="testi_item">
								<p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel across her face</p>
								<h4>Fanny Spencer</h4>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star-half-o"></i></a>
							</div>
						</div>
					</div>
        		</div>
        	</div>
        </section>
        <!--================End Testimonials Area =================-->
        
        <!--================Latest Blog Area =================-->
        <section class="latest_blog_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Latest Posts from Blog</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="row latest_blog_inner">
        			<div class="col-lg-4">
        				<div class="l_blog_item">
        					<div class="l_blog_img">
        						<img class="img-fluid" src="/public/template/public/img/blog/home-blog/home-blog-1.jpg" alt="">
        					</div>
        					<div class="l_blog_text">
        						<div class="date">
        							<a href="#">25 October, 2017  |  By Mark Wiens</a>
        						</div>
        						<a href="#"><h4>Addiction When Gambling Becomes A Problem</h4></a>
        						<p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery people scan bar codes with handhelds and workers in the field stay</p>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="l_blog_item">
        					<div class="l_blog_img">
        						<img class="img-fluid" src="/public/template/public/img/blog/home-blog/home-blog-2.jpg" alt="">
        					</div>
        					<div class="l_blog_text">
        						<div class="date">
        							<a href="#">25 October, 2017  |  By Mark Wiens</a>
        						</div>
        						<a href="#"><h4>Make Myspace Your Best Designed Space</h4></a>
        						<p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery people scan bar codes with handhelds and workers in the field stay</p>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="l_blog_item">
        					<div class="l_blog_img">
        						<img class="img-fluid" src="/public/template/public/img/blog/home-blog/home-blog-3.jpg" alt="">
        					</div>
        					<div class="l_blog_text">
        						<div class="date">
        							<a href="#">25 October, 2017  |  By Mark Wiens</a>
        						</div>
        						<a href="#"><h4>Video Games Playing With Imagination</h4></a>
        						<p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery people scan bar codes with handhelds and workers in the field stay</p>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section> --}}

        <div id = "lienhe" class="lienhe">
            
       
        <section class="contact_area p_120">
        	<div class="main_title">
        			<h2>Liên hệ</h2>
        			<p></p>
        		</div>
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>Da Nang, Viet Nam</h6>
                                <p></p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">0362729723</a></h6>
                                 <p></p>
                                
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">phuctran130596@gmail.com</a></h6>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form class="row contact_form" action="{{route('admin.lienhe.addpublic')}}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
         </div>
@endsection