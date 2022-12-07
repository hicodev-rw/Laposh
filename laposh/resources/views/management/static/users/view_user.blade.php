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
									<img src="{{$user->avatar}}" alt="{{$user->lastName}}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">{{$user->title}} {{$user->lastName}}</h5>
									<div class="text-muted mb-2">{{$user->role}}</div>
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
												<th>{{$user->firstName}}</th>
											</tr>
                                            <tr>
												<th>Last Name</th>
												<th>{{$user->lastName}}</th>
											</tr>
                                            <tr>
												<th>Email</th>
												<th>{{$user->email}}</th>
											</tr>
                                            <tr>
										</tbody>
									</table>
                                    <br>
                                    <a href="{{ url('/management/users/'. $user->id .'/edit') }}" class="btn a btn-primary btn-lg">Update This user</a>
								</div>
							</div>
							</div>
		</div>
</div>
</div>
		 <!-- @if($user->role=='client') -->
		 <hr/>
		<h1 class="h3 mb-3"><strong>{{$user->firstName}}'s Bookings</strong></h1>

<div class="row">
	<div class="col-xl-12 col-xxl-2 d-flex">
		<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
			<div style="width: 90%; padding:10px;"  class="card flex-fill">
			@if(session('message'))
	<div class="success">
		{{ session('message') }}
	</div>
@endif
				<div class="card-header">
				</div>
				<table class="table table-hover my-0">
					<thead>
						<tr>
							<th>#</th>
							<th class="d-none d-xl-table-cell">Reference</th>
							<th>Check in date</th>
							<th>Check out date</th>
							<th class="d-none d-xl-table-cell">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user->reservations as $booking)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td  class="d-none d-xl-table-cell">{{$booking->reference}}</td>
							<td>{{$booking->check_in_date}}</td>
							<td>{{$booking->check_out_date}}</td>
							<td>
<ul class="navbar-nav navbar-align">
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
		 
		<div class="dropdown-menu dropdown-menu-end">
@if(auth()->user()->can('view-reservation'))
<a href="{{ url('/management/bookings/'. $booking->id) }}" class="dropdown-item">View</a>
@endif
		</div>
	</li>
</ul>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<!-- @endif -->
</main>
@endsection