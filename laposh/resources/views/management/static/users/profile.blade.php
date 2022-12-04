@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
                    <h1 class="h3 mb-3"><strong>User Profile</strong></h1>
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Summary</h5>
								</div>
								<div class="card-body text-center">
									<img src="{{ auth()->user()->avatar }}" alt="" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">{{ auth()->user()->lastName }}</h5>
									<div class="text-muted mb-2">{{ auth()->user()->role }}</div>
								</div>

							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Full Profile</h5>
								</div>
								<div class="card-body h-100">
                                <div class="col-xl-12 col-xxl-2 d-flex">
							<div style="width: 80%;margin:auto" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;"  class="card flex-fill">
									<div class="card-header">
	
										<h5 class="card-title mb-0"></h5>
									</div>
									<table class="table table-hover my-0">
										<tbody>
											<tr>
												<th>First Name</th>
												<th>{{ auth()->user()->firstName }}</th>
											</tr>
                                            <tr>
												<th>Last Name</th>
												<th>{{ auth()->user()->lastName }}</th>
											</tr>
                                            <tr>
												<th>Email</th>
												<th>{{ auth()->user()->email }}</th>
											</tr>
                                            <tr>
												<th>role</th>
												<th>{{ auth()->user()->role }}</th>
											</tr>
                                            <tr>
										</tbody>
									</table>
                                    <br>
									@if(auth()->user()->can('edit-user'))
                                    <a href="{{ url('/management/users/'. auth()->user()->id .'/edit') }}" class="btn a btn-primary btn-lg">Update Profile</a>
									@endif
								</div>
							</div>
							</div>
		</div>
@endsection