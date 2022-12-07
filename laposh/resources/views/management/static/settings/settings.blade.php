@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Hotel information</strong></h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;"  class="card flex-fill">
									<div class="card-header">
	
										<h5 class="card-title mb-0">Hotel Logo</h5>
									</div>
                                    <div class="card" style="padding-left:15px;padding-right:15px;">
									<img class="card-img-top" src="{{$info->logo}}" alt="{{$info->logo}}" style="max-height:500px;">
                                    </div>
								</div>
							</div>
							</div>
						<div class="col-xl-6 col-l-7">
							<div class="card flex-fill">
                            <div class="card-header">

					<h5 class="card-title mb-0">Hotel information</h5>
					</div>
					<div class="col-xl-12 col-l-7">
							<div class="card flex-fill">
								<form action="{{url('/management/update/settings')}}"  method='post' enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="card-body">
										<h5 class="card-title mb-0">Hotel Name</h5>
										<input type="text" name="name" value="{{$info->name}}"class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Location</h5>
										<input type="text" name="address" value="{{$info->address}}"class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Email</h5>
										<input type="email" name="email" value="{{$info->email}}" class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Telephone</h5>
										<input type="text" name="phone" value="{{$info->phone}}" class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">About section</h5>
										<textarea name="about" class="form-control">
										{{$info->about}}
										</textarea>
									</div>

									<div class="card-body">
										<h5 class="card-title mb-0">logo</h5>
										<input type="file" name="logo" class="form-control">
									</div>

									<button type="submit"class="btn btn-primary btn-md">Update</button>
								</form>
							</div>
						</div>
					</div>

							</div>
						</div>
					</div>
			</main>
@endsection