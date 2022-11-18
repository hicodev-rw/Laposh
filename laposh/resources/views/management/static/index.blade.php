
@extends('management.static.layout')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Bookings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="book"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$bookings}}</h1>
												<div class="mb-0">
												@if($booking_stats>0)
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> +{{$booking_stats}}% </span>
													@else
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -{{$booking_stats}}% </span>
													@endif
													<span class="text-muted">compared to last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Ongoing deals</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="refresh-ccw"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$ongoing}}</h1>
												<div class="mb-0">
												@if($ongoing_stats>0)
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> +{{$ongoing_stats}}% </span>
													@else
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -{{$ongoing_stats}}% </span>
													@endif
													<span class="text-muted">compared to last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Closed deals</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="check-circle"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$closed}}</h1>
												<div class="mb-0">
												@if($closed_stats>0)
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> +{{$closed_stats}}% </span>
													@else
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -{{$closed_stats}}% </span>
													@endif
													<span class="text-muted">compared to last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Cancelled deals</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="x"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$cancelled}}</h1>
												<div class="mb-0">
												@if($cancelled_stats>0)
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> +{{$cancelled_stats}}% </span>
													@else
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -{{$cancelled_stats}}% </span>
													@endif
													<span class="text-muted">compared to last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Earnings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">${{$payments_count}}</h1>
												<div class="mb-0">
												<br>
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i></span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Rooms</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="home"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$rooms}}</h1>
												<div class="mb-0">
													<br>
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{$categories}} </span>
													<span class="text-muted">categories</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Clients</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$clients}}</h1>
												<div class="mb-0">
												@if($clients_stats>0)
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> +{{$clients_stats}}% </span>
													@else
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -{{$clients_stats}}% </span>
													@endif
													<span class="text-muted">compared to last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Users</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$users}}</h1>
												<div class="mb-0">
												<br>
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
													
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i></span>
												
													<span class="text-muted"></span>
													<br>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
									<div class="card-header">
										<h5 class="card-title mb-0">Bookings</h5>
									</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
							<div class="card flex-fill w-100">
									<div class="card-header">
										<h5 class="card-title mb-0">Bookings (This year vs Last year)</h5>
									</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">cancelling</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-bar"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex" id="payments">
							<div class="card flex-fill" style="padding:10px;">
								<div class="card-header">
									<h5 class="card-title mb-0">Payments</h5>
								</div><hr/>
								<table class="table table-hover my-0">
									<thead>
										<tr>
										<th>#</th>
											<th>Reference</th>
											<th>Booking reference</th>
											<th class="d-none d-xl-table-cell">Client</th>
										</tr>
									</thead>
									<tbody>
										@foreach($payments as $payment)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td class="d-none d-xl-table-cell">{{$payment->reference}}</td>
											<td class="d-none d-xl-table-cell">{{$payment->booking->reference}}</td>
											<td class="d-none d-xl-table-cell">{{$payment->booking->user->lastName}}</td>
											
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Popular booked rooms</h5>
								</div>
								<div class="card-body d-flex w-100">
								<ul class="sidebar-nav">

<li class="sidebar-item">
	<a class="sidebar-link" href="/management/dashboard">
<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
</a>
</li>
</li>
</ul>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>
		var graph2 = {{ Js::from($graph2) }};
		var graph3 = {{ Js::from($graph3) }};
		var graph4 = {{ Js::from($graph4) }};
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Last year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [
							Object.values(graph2)[0]['count'],
							Object.values(graph2)[1]['count'],
							Object.values(graph2)[2]['count'],
							Object.values(graph2)[3]['count'],
							Object.values(graph2)[4]['count'],
							Object.values(graph2)[5]['count'],
							Object.values(graph2)[6]['count'],
							Object.values(graph2)[7]['count'],
							Object.values(graph2)[8]['count'],
							Object.values(graph2)[9]['count'],
							Object.values(graph2)[10]['count'],
							Object.values(graph2)[11]['count']],
						barPercentage: .75,
						categoryPercentage: .5
					}, {
						label: "This year",
						backgroundColor: "#dee2e6",
						borderColor: "#dee2e6",
						hoverBackgroundColor: "#dee2e6",
						hoverBorderColor: "#dee2e6",
						data: [
							Object.values(graph3)[0]['count'],
							Object.values(graph3)[1]['count'],
							Object.values(graph3)[2]['count'],
							Object.values(graph3)[3]['count'],
							Object.values(graph3)[4]['count'],
							Object.values(graph3)[5]['count'],
							Object.values(graph3)[6]['count'],
							Object.values(graph3)[7]['count'],
							Object.values(graph3)[8]['count'],
							Object.values(graph3)[9]['count'],
							Object.values(graph3)[10]['count'],
							Object.values(graph3)[11]['count']
						],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		var graph = {{ Js::from($graph) }};
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Bookings",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							Object.values(graph)[0]['count'],
							Object.values(graph)[1]['count'],
							Object.values(graph)[2]['count'],
							Object.values(graph)[3]['count'],
							Object.values(graph)[4]['count'],
							Object.values(graph)[5]['count'],
							Object.values(graph)[6]['count'],
							Object.values(graph)[7]['count'],
							Object.values(graph)[8]['count'],
							Object.values(graph)[9]['count'],
							Object.values(graph)[10]['count'],
							Object.values(graph)[11]['count']
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [
							Object.values(graph4)[0]['count'],
							Object.values(graph4)[1]['count'],
							Object.values(graph4)[2]['count'],
							Object.values(graph4)[3]['count'],
							Object.values(graph4)[4]['count'],
							Object.values(graph4)[5]['count'],
							Object.values(graph4)[6]['count'],
							Object.values(graph4)[7]['count'],
							Object.values(graph4)[8]['count'],
							Object.values(graph4)[9]['count'],
							Object.values(graph4)[10]['count'],
							Object.values(graph4)[11]['count']
						],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

			@endsection
			