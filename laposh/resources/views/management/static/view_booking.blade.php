<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>La Posh Hotel</title>

	<link href="../../../css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">La Posh Hotel</span>
        </a>

				<ul class="sidebar-nav">

					<li class="sidebar-item">
						<a class="sidebar-link" href="index.html">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="rooms.html">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Rooms</span>
            </a>
		</li>
		<li class="sidebar-item active">
			<a class="sidebar-link" href="bookings.html">
  <i class="align-middle" data-feather="book"></i> <span class="align-middle">Reservations</span>
</a>
<li class="sidebar-item">
	<a class="sidebar-link" href="categories.html">
<i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Categories</span>
</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="checkin.html">
					<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Check-in</span>
					</a>
										</li>

									</li>
			<li class="sidebar-item">
					<a class="sidebar-link" href="checkout.html">
					<i class="align-middle" data-feather="minus"></i> <span class="align-middle">Check-out</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="settings.html">
				<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
			</a>
		</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="users.html">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
            </a>
</li>


				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Hicode</strong>
						<div class="mb-3 text-sm">
Administrator
						</div>
						<div class="d-grid">
							<a href="logout.html" class="btn btn-primary">Sign Out</a>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									1 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">Charles Hall</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
						</li>
					</ul>
				</div>
			</nav>

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
												<th>Client</th>
												<th class="d-none d-xl-table-cell">{{$booking->customer->firstName}} {{$booking->customer->lastName}}</th>
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

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							
						</div>
						<div class="col-6 text-end">
							
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="../../../js/app.js"></script>
</body>

</html>