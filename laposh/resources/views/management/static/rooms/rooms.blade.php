@extends('management.static.layout')
@section('content')   
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Rooms</strong></h1>

					<div class="row">
						<div class="col-xl-8 col-xxl-6 d-flex">
							<div style="width: 100%; " class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="padding:10px;"  class="card flex-fill">
								@if(session('message'))
						<div class="success">
							{{ session('message') }}
						</div>
					@endif
							<div class="card-header">
								
							</div>
									<table id="example" class="table table-hover my-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Code</th>
												<th class="d-none d-xl-table-cell">Category</th>
												<th>Price ($)</th>
												<th>Actions</th>
											</tr>
										</thead>
		<tbody>
		@foreach($rooms as $room)
			<tr>
				<td>{{$loop->iteration}}</td>
					<td>{{$room->name}}</td>
					<td class="d-none d-xl-table-cell">{{$room->category->name}}</td>
					<td>{{$room->price}}</td>
					<td>
					<form action=' {{url('/management/rooms' . '/' .   $room->id)}}' method="post">
					{{method_field('DELETE')}}
					{{ csrf_field() }}
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
							 
							<div class="dropdown-menu dropdown-menu-end">
								@if(auth()->user()->can('edit-room'))
								<a href="{{ url('/management/rooms/'. $room->id .'/edit') }}" class="dropdown-item">Edit</a>
								@endif
								@if(auth()->user()->can('view-room'))
								<a href="{{ url('/management/rooms/'. $room->id) }}" class="dropdown-item">View</a>
								@endif
								@if(auth()->user()->can('delete-room'))
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
				@if(auth()->user()->can('create-room'))
						<div class="col-xl-4 col-l-7">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Add New Room</h5>
									@if ($errors->has('name'))
										<p class='error'>{{$errors->first('name')}}</p>
										@endif
								</div>
								<form action="{{url('/management/rooms')}}"  method='post' enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="card-body">
										<h5 class="card-title mb-0">Name</h5>
										<input type="text" name="name" class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Category</h5>
										<select name="category_id" class="form-control">
											@foreach($category as $cat)
										<option value="{{$cat->id}}">{{$cat->name}}</option>
										@endforeach
										</select>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Price ($)</h5>
										<input type="number" name="price"
										step=".01" class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Specifications</h5>
										<textarea name="specifications" class="form-control">
										</textarea>
									</div>

									<div class="card-body">
										<h5 class="card-title mb-0">Image (s)</h5>
										<input type="file" name="images[]" class="form-control" multiple>
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