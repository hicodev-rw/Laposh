@extends('web.dashboard.layout')
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
										<thead>
											<tr>
												<th>First Name</th>
												<th class="d-none d-xl-table-cell">{{ auth()->user()->firstName }}</th>
											</tr>
                                            <tr>
												<th>Last Name</th>
												<th class="d-none d-xl-table-cell">{{ auth()->user()->lastName }}</th>
											</tr>
                                            <tr>
												<th>Email</th>
												<th class="d-none d-xl-table-cell">{{ auth()->user()->email }}</th>
											</tr>
                                            <tr>
										</thead>
									</table>
                                    <br>
                                    <a href="{{ url('/customers/'. auth()->user()->id .'/edit') }}" class="btn a btn-primary btn-lg">Update Profile</a>
								</div>
							</div>
							</div>
		</div>
@endsection