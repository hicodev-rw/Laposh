@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>System Users</strong></h1>

					<div class="row">
						<div class="col-xl-8 col-xxl-2 d-flex">
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
					<td>
					<form action=' {{url('/management/users' . '/' .   $user->id)}}' method="post">
					{{method_field('DELETE')}}
					{{ csrf_field() }}
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
							 
							<div class="dropdown-menu dropdown-menu-end">
								@if(auth()->user()->can('edit-user'))
								<a href="{{ url('/management/users/'. $user->id .'/edit') }}" class="dropdown-item">Edit</a>
								@endif
								@if(auth()->user()->can('view-user'))
								<a href="{{ url('/management/users/'. $user->id) }}" class="dropdown-item">View</a>
								@endif
								@if(auth()->user()->can('delete-user'))
								<button class="dropdown-item">Delete</button>
								@endif  
							</div>
						</li>
					</ul>
				</form>
												</td>
												@endforeach
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
							</div>
						<div class="col-xl-4 col-l-7">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Add New User</h5>
									@if ($errors->has('name'))
										<p class='error'>{{$errors->first('name')}}</p>
										@endif
								</div>
								<form action="{{url('/management/users')}}"  method='post' enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="card-body">
										<h5 class="card-title mb-0">firstName</h5>
										<input type="text" name="firstName" class="form-control" required>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">lastName</h5>
										<input type="text" name="lastName" class="form-control" required>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Email</h5>
										<input type="email" name="email" class="form-control"required>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Password</h5>
										<input type="password" name="password" class="form-control"required>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Role</h5>
										<select name="role" class="form-control">
											@foreach($roles as $role)
										<option value="{{$role->name}}">{{$role->name}}</option>
										@endforeach
										</select>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Prefered title</h5>
										<select name="title" class="form-control">	
										<option value="Mr.">Mr.</option>
										<option value="Mrs.">Mrs.</option>
										<option value="Miss.">Miss.</option>
										</select>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Avatar</h5>
										<input type="file" name="avatar" class="form-control">
									</div>

									<div class="card-body">
									<button type="submit"class="btn btn-primary btn-md" style="width:100%;">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>

			

					<div class="row">

						
					</div>

				</div>
			</main>
@endsection