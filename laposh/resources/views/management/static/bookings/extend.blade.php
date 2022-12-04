@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
                    <h1 class="h3 mb-3"><strong>Reservation Check-out extension</strong></h1>
					</div>
					<div class="row">
							<div class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;"  class="card flex-fill">
									<div class="card-header">
                                    <h5 class="card-title mb-0">Booking Summary</h5>
									</div>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>Reference</th>
												<th class="d-none d-xl-table-cell">{{$reservation->reference}}</th>
											</tr>
                                            <tr>
												<th>Room</th>
												<th class="d-none d-xl-table-cell">{{$reservation->room->name}}</th>
											</tr>
                                            <tr>
												<th>Room Price ($)</th>
												<th class="d-none d-xl-table-cell">{{$reservation->room->price}}</th>
											</tr>
                                            <tr>
												<th>Client</th>
												<th class="d-none d-xl-table-cell">{{$reservation->customer->firstName}} {{$reservation->customer->lastName}}</th>
											</tr>
                                            <tr>
												<th>Check-in-Date</th>
												<th class="d-none d-xl-table-cell">{{$reservation->check_in_date}}</th>
											</tr>
                                            <tr>
												<th>Check_out_date</th>
												<th class="d-none d-xl-table-cell">{{$reservation->check_out_date}}</th>
											</tr>
                                            <tr>
												<th>Status</th>
												<th class="d-none d-xl-table-cell">{{$reservation->status->name}}</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>

						<div class="col-md-2 col-xl-4">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Extension details</h5>
                                    <hr/>
								</div>
								<form action="{{url('/management/bookings/'.$reservation->id)}}"  method='post'>
									{{csrf_field()}}
                                    @method('PATCH')
									<div class="card-body">
										<h5 class="card-title mb-0">Check_out_date</h5><br>
										<input type="date" 
                                        value="{{$reservation->check_out_date}}" name="check_out_date" class="form-control">
									</div>
									<button type="submit"class="btn btn-primary btn-md">Extend stay</button>
								</form>
							</div>

				</div>
</main>

@endsection