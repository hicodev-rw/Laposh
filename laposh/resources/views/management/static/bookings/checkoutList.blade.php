@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Bookings to check out</strong></h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%; padding:10px;"  class="card flex-fill">
									<div class="card-header">
	
									</div>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Reference</th>
												<th class="d-none d-xl-table-cell">Room</th>
												<th class="d-none d-xl-table-cell">Status</th>
												<th class="d-none d-xl-table-cell">Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($bookings as $booking)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$booking->reference}}</td>
												<td class="d-none d-xl-table-cell">{{$booking->room->name}}</td>
												<td class="d-none d-xl-table-cell">{{$booking->status->name}}</td>
												<td><form action=' {{url('/management/reservations/checkout/'.   $booking->id)}}' method="post">
					@method('patch')
					{{ csrf_field() }} 
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
							 
							<div class="dropdown-menu dropdown-menu-end">
					@if(auth()->user()->can('view-reservation'))
					<a href="{{ url('/management/bookings/'. $booking->id) }}" class="dropdown-item">View</a>
					@endif
					@if(auth()->user()->can('check-out'))
                                                <button class="dropdown-item">Check-out</button>
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