@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
                    <h1 class="h3 mb-3"><strong>Update User Profile</strong></h1>
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Summary</h5>
								</div>
								<div class="card-body text-center">
									<img src="{{$user->avatar}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">{{$user->title}} {{$user->lastName}}</h5>
									<div class="text-muted mb-2">{{$user->role}}</div>
								</div>

							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">User Profile</h5>
								</div>
								<div class="card-body h-100">
							<div style="width: 80%;margin:auto" class="col-12 col-lg-8 col-xxl-9 d-flex" >
							<div class="col-xl-12 col-l-12">
							<div class="card flex-fill">
								<div class="card-header">
								</div>
								<form action="{{url('/management/users/'.$user->id)}}"  method='post'>
									{{csrf_field()}}
                                    @method('PATCH')
									<div class="card-body">
										<h5 class="card-title mb-0">firstName</h5>
										<input type="text" value="{{$user->firstName}}" name="firstName" class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">lastName</h5>
										<input type="text" value="{{$user->lastName}}"name="lastName" class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Email</h5>
										<input type="email" value="{{$user->email}}" name="email" class="form-control">
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
										<h5 class="card-title mb-0">Password</h5>
										<input type="password"  name="password" class="form-control">
									</div>
									<button type="submit"class="btn btn-primary btn-md" style="width:100%;">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
</main>

@endsection