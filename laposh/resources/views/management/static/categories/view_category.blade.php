@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>{{$category->name}}</strong></h1>

					<div class="row">
						<div class="col-xl-8 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;padding:10px;"  class="card flex-fill">
									<div class="card-header">
	
										<h5 class="card-title mb-0">Rooms</h5>
									</div>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Image</th>
												<th>Name</th>
												<th>Action</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($rooms as $room)
                                            <tr>
                                        <td>{{$loop->iteration}}</td>
										<td><img src="{{ $room->images[0] }}" width="36" height="36" class="rounded-circle me-2" alt="" /> </td>
					<td>{{$room->name}}</td>
					<td class="d-none d-xl-table-cell">{{$room->price}}</td>
					<td class="d-none d-xl-table-cell">
					<form action=' {{url('/management/rooms' . '/' .   $room->id)}}' method="post">
					{{method_field('DELETE')}}
					{{ csrf_field() }}
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
							 
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
</tr>
												@endforeach
										</tbody>
									</table>
								</div>
							</div>
							</div>
						<div class="col-xl-4 col-l-7">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Information</h5>
								</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Category Name</h5>
										<input type="text" name="name" class="form-control" value="{{$category->name}}" readonly>
									</div>
							</div>
						</div>
					</div>

			

					<div class="row">

						
					</div>

				</div>
			</main>
@endsection