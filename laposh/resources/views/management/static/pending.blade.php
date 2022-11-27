@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Pending Bookings</strong></h1>

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
												<th  class="d-none d-xl-table-cell">Reference</th>
												<th>Room</th>
												<th class="d-none d-xl-table-cell">Booking Time</th>
												<th>Check in date</th>
												<th class="d-none d-xl-table-cell">Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($bookings as $booking)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td  class="d-none d-xl-table-cell">{{$booking->reference}}</td>
												<td>{{$booking->room->name}}</td>
												<td class="d-none d-xl-table-cell">{{$booking->created_at}}</td>
												<td>{{$booking->check_in_date}}</td>
												<td>
												<form action=' {{url('/management/reservations/cancel' . '/' .   $booking->id)}}' method="post">
					{{method_field('PATCH')}}
					{{ csrf_field() }} 
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
							 
							<div class="dropdown-menu dropdown-menu-end">
					@if(auth()->user()->can('extend-reservation'))
					<a href="{{ url('/management/bookings/'. $booking->id .'/edit') }}" class="dropdown-item">Extend</a>
					@endif
					@if(auth()->user()->can('view-reservation'))
					<a href="{{ url('/management/bookings/'. $booking->id) }}" class="dropdown-item">View</a>
					@endif
					@if(auth()->user()->can('cancel-reservation'))
                    <button class="dropdown-item">Cancel</button>
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
					<div class="row">
					</div>

				</div>
			</main>
@endsection