@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Clients</strong></h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;padding:10px;"  class="card flex-fill">
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
												<th>Names</th>
												<th class="d-none d-xl-table-cell">Registered</th>
												<th>Actions</th>
											</tr>
										</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$loop->iteration}}</td>
					<td>{{$user->firstName}} {{$user->lastName}}</td>
					<td class="d-none d-xl-table-cell">{{$user->created_at}}</td>
					<td>
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
							 
							<div class="dropdown-menu dropdown-menu-end">
								<a href="{{ url('/management/users/'. $user->id) }}" class="dropdown-item">View</a>
							</div>
						</li>
					</ul>
												</td>
												@endforeach
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
							</div>
					</div>

			

					<div class="row">

						
					</div>

				</div>
			</main>
@endsection