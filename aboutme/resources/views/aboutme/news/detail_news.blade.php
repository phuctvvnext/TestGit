@extends('templates.aboutme.master')
@section('main-content')
	<section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img">
                                    <img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
                                </div>									
                            </div>
                            
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2>{{$tintuc->name}}</h2>
                                <p>
                                	
                                	{!! $tintuc->detail_text !!}
                                </p>
                                
                            </div>
                        </div>
                        
                        <div class="comments-area">
                            <h4>{{count($commentList)}} Comments</h4>
                            @foreach($commentList as $comment)
	                            <div class="comment-list">
	                                <div class="single-comment justify-content-between d-flex">
	                                    <div class="user justify-content-between d-flex">
	                                        <div class="thumb">
	                                            <img src="img/blog/c1.jpg" alt="">
	                                        </div>
	                                        <div class="desc">
	                                            <h5><a href="#">{{$comment->fullname}}</a></h5>
	                                            <p class="date">December 4, 2017 at 3:12 pm </p>
	                                            <p class="comment">
	                                                {{$comment->content}}
	                                            </p>
	                                        </div>
	                                    </div>
	                                    <div class="reply-btn">
	                                           <a href="" class="btn-reply text-uppercase">reply</a> 
	                                    </div>
	                                </div>
	                            </div>	
                            @endforeach
                            
                            {{-- <div class="comment-list left-padding">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/blog/c3.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Annie Stephens</a></h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                            <p class="comment">
                                                Never say goodbye till the end comes!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                           <a href="" class="btn-reply text-uppercase">reply</a> 
                                    </div>
                                </div>
                            </div>	 --}}
                                                                        				
                        </div>
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form action="javascript:void(0)" onsubmit="cmt({{$tintuc->id_news}})" method="post" >
                            	<input type="hidden" name="_token" value="">
                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" required="">
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required="">
                                  </div>										
                                </div>
                                
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" id="noidung" name="noidung" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                </div>
                                <button type="submit" class="primary-btn submit_btn">Post Comment</button>	
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <form class="single_sidebar_widget search_widget" action="{{route('auth.search')}}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key" placeholder="Search Posts">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </form>
                           
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Danh mục</h3>

                                <div class="media post_item">
                                    @foreach($danhmucforleftbar as $danhmuc)
                                    @php
                                    	$id = $danhmuc->id_cat;
                                    @endphp
                                    <div class="media-body">
                                        <a href="{{route('aboutme.danhmuc.getCat',$id)}}"><h3>{{$danhmuc->name}}</h3></a>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget ads_widget">
                                <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Tin tức mới nhất</h4>
                                <ul class="list cat-list">
                                	@foreach($tintucXemnhieu as $ttxn)
                                	@php
                                		$slug = str_slug($ttxn->name);
                                		$id = $ttxn->id_news;
                                	@endphp
                                    <li>
                                        <a href="{{route('aboutme.news.detail',[$slug,$id])}}" class="d-flex justify-content-between">
                                            <p>{{$ttxn->name}}</p>
                                            
                                        </a>
                                    </li>
                                    @endforeach
                                    											
                                </ul>
                                <div class="br"></div>
                            </aside>
                             <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Tin tức liên quan</h4>
                                <ul class="list cat-list">
                                	@foreach($tintucLQ as $ttlq)
                                	@php
                                		$slug = str_slug($ttlq->name);
                                		$id = $ttlq->id_news;
                                	@endphp
                                    <li>
                                        <a href="{{route('aboutme.news.detail',[$slug,$id])}}" class="d-flex justify-content-between">
                                            <p>{{$ttlq->name}}</p>
                                            
                                        </a>
                                    </li>
                                    @endforeach
                                    											
                                </ul>
                                <div class="br"></div>
                            </aside>
                           {{--  <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>
                                <p>
                                Here, I focus on a range of items and features that we use in life without
                                giving them a second thought.
                                </p>
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    </div>
                                    <a href="#" class="bbtns">Subcribe</a>
                                </div>	
                                <p class="text-bottom">You can unsubscribe at any time</p>	
                                <div class="br"></div>							
                            </aside> --}}
                            {{-- <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Adventure</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Adventure</a></li>
                                </ul>
                            </aside> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>

        	function cmt(nid) {
        		var url = 'http://aboutme.vne:81/cmt/'+nid;
        		var name = $('#name').val();
        		var email = $('#email').val();
        		var noidung = $('#noidung').val();
        		var tmp = ".comments-area";
        		//alert(name+email+noidung);

               // alert(isActive);

               $.ajax({
               	url: url,
               	type: 'POST',
               	cache: false,
               	data: {
               		nid : nid,
               		name : name,
               		email :email,
               		noidung : noidung,
               		_token: '{!! csrf_token() !!}',

               	},

               	success: function(data){
                        $(tmp).html(data);
                    },
                    error: function (){
                    	alert('Có lỗi xảy ra');
                    }

                });
               return false;
           } 

       </script>
@endsection