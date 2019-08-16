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
				<form action="{{route('admin.duan.add')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label>Tên du an</label>
								<input type="text" name="name" class="form-control border-input" placeholder="tên" value="">
							</div>
						</div>
					</div>
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label>Link</label>
								<input type="text" name="link" class="form-control border-input" placeholder="link" value="">
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
