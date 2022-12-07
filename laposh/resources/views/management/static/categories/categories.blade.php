@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Room Categories</strong></h1>

					<div class="row">
						<div class="col-xl-8 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="padding:10px;width: 90%;"  class="card flex-fill">
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
												<th>Name</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($categories as $category)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$category->name}}</td>
												<td class="d-none d-xl-table-cell">
												<form action=' {{url('/management/categories' . '/' .   $category->id)}}' method="post">
					{{method_field('DELETE')}}
					{{ csrf_field() }}
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
							 
							<div class="dropdown-menu dropdown-menu-end">
								@if(auth()->user()->can('edit-category'))
								<a href="{{ url('/management/categories/'. $category->id .'/edit') }}" class="dropdown-item">Edit</a>
								@endif
								@if(auth()->user()->can('view-category'))
								<a href="{{ url('/management/categories/'. $category->id) }}" class="dropdown-item">View</a>
								@endif
								@if(auth()->user()->can('delete-category'))
								<button class="dropdown-item">Delete</button>
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
							</div>
							@if(auth()->user()->can('create-category'))
						<div class="col-xl-4 col-l-7">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Add New</h5>
									@if ($errors->has('name'))
										<p class='error'>{{$errors->first('name')}}</p>
										@endif
								</div>
								<form action="{{ url('management/categories') }}" method='post'>
									{{ csrf_field() }}
									<div class="card-body">
										<h5 class="card-title mb-0">Name</h5>
										<input type="text" name="name" class="form-control">
									</div>

									<div class="card-body">
									<button type="submit"class="btn btn-primary btn-md" style="width:100%;">Save</button>
									</div>
								</form>
							</div>
						</div>
						@endif
					</div>

			

					<div class="row">

						
					</div>

				</div>
			</main>
@endsection