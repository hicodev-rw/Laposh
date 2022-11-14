@extends('web.dashboard.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Booking information</strong></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-2 d-flex">
							<div style="width: 60%;margin:auto" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;"  class="card flex-fill">
									<div class="card-header">
	
										<h5 class="card-title mb-0"></h5>
									</div>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>Reference</th>
												<th class="d-none d-xl-table-cell">{{$booking->reference}}</th>
											</tr>
                                            <tr>
												<th>Room</th>
												<th class="d-none d-xl-table-cell">{{$booking->room->name}}</th>
											</tr>
                                            <tr>
												<th>Room Price ($)</th>
												<th class="d-none d-xl-table-cell">{{$booking->room->price}}</th>
											</tr>
                                            <tr>
												<th>Check-in-Date</th>
												<th class="d-none d-xl-table-cell">{{$booking->check_in_date}}</th>
											</tr>
                                            <tr>
												<th>Check_out_date</th>
												<th class="d-none d-xl-table-cell">{{$booking->check_out_date}}</th>
											</tr>
                                            <tr>
												<th>Status</th>
												<th class="d-none d-xl-table-cell">{{$booking->status->name}}</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							</div>
					<div class="row">

						
					</div>

				</div>
			</main>
@endsection