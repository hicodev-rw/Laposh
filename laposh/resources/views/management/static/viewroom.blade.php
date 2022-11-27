@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Room information</strong></h1>

					<div class="row">
						<div class="col-xl-8 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;"  class="card flex-fill">
									<div class="card-header">
	
										<h5 class="card-title mb-0">Room Image</h5>
									</div>
                                    <div class="card" style="padding-left:15px;padding-right:15px;">
									<img class="card-img-top" src="{{$room->images[0]}}" alt="" style="max-height:500px;">
                                    </div>
								</div>
							</div>
							</div>
						<div class="col-xl-4 col-l-7">
							<div class="card flex-fill">
                            <div class="card-header">

<h5 class="card-title mb-0">Room information</h5>
</div>
								
									<div class="card-body">
										<h5 class="card-title mb-0">Name</h5>
										<input type="text" name="name" class="form-control"
                                        value="{{$room->name}}" readonly>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Category</h5>
										<input type="text" name="code" class="form-control"
                                        value="{{$room->category->name}}" readonly>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Price ($)</h5>
										<input type="number" name="price" class="form-control"
                                        value="{{$room->price}}" readonly>
									</div>
									<div>
									<div class="card-body">
									<h5 class="card-title mb-0">Specifications</h5>
									<hr/>
									{{$room->specifications}}
								</div></div>
								</div>
						</div>
					</div>
				<div class="row">
					@foreach($room->images as $image)
					<div class="col-12 col-md-4">
						<div class="card">
							<img class="card-img-top" src="{{$image}}" alt="Unsplash">
						</div>
					</div>
					@endforeach
				</div>

				<hr/>
				<h1 class="h3 mb-3"><strong>{{$room->name}}'s Bookings</strong></h1>

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
						@foreach($room->reservation as $booking)
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
</div>
			</main>
@endsection