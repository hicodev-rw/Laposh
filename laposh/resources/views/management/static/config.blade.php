@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>System Users configurations</strong></h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;padding:20px;"  class="card flex-fill">
									<div class="card-header">
	
										<h5 class="card-title mb-0">Users</h5>
									</div>
									<hr/>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Username</th>
												<th class="d-none d-xl-table-cell">Role</th>
												<th>Actions</th>
											</tr>
										</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$loop->iteration}}</td>
					<td>{{$user->email}}</td>
					<td class="d-none d-xl-table-cell">{{$user->role}}</td>
					<td class="d-none d-xl-table-cell">
					<form action=' {{url('/management/users' . '/' .   $user->id)}}' method="post">
					{{method_field('DELETE')}}
					{{ csrf_field() }} 
					<a href="{{ url('/management/users/'. $user->id .'/edit') }}" class="btn a btn-primary btn-sm">Edit</a>
					<a href="{{ url('/management/roles/'. $user->id.'/edit') }}" class="btn a btn-primary btn-sm">Manage Permissions</a>
					<a href="{{ url('/management/users/'. $user->id) }}" class="btn a btn-primary btn-sm">View</a>

                                                <button class="btn btn-danger btn-sm">Delete</button>
													</form>

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
						<div class="col-xl-8 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;padding:20px;"  class="card flex-fill">
									<div class="card-header">
	
										<h5 class="card-title mb-0">User Roles</h5>
									</div>
									<hr/>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Actions</th>
											</tr>
										</thead>
		<tbody>
		@foreach($roles as $role)
			<tr>
				<td>{{$loop->iteration}}</td>
					<td>{{$role->name}}</td>
					<td class="d-none d-xl-table-cell">
					<form action=' {{url('/management/roles' . '/' .   $role->id)}}' method="post">
					{{method_field('DELETE')}}
					{{ csrf_field() }} 
					<a href="{{ url('/management/roles/'. $role->id .'/edit') }}" class="btn a btn-primary btn-sm">Edit</a>
					<a href="{{ url('/management/roles/'. $role->id) }}" class="btn a btn-primary btn-sm">View</a>

                                                <button class="btn btn-danger btn-sm">Delete</button>
													</form>

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