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
				<a class="sidebar-brand" href="/dashboard">
          <span class="align-middle">La Posh Hotel</span>
        </a>

				<ul class="sidebar-nav">

					<li class="sidebar-item">
						<a class="sidebar-link" href="/dashboard">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="/rooms">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Rooms</span>
            </a>
		</li>
		<li class="sidebar-item">
			<a class="sidebar-link" href="/bookings">
  <i class="align-middle" data-feather="book"></i> <span class="align-middle">Reservations</span>
</a>
<li class="sidebar-item">
	<a class="sidebar-link" href="/categories">
<i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Categories</span>
</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/reservations/checkin/list">
					<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Check-in</span>
					</a>
										</li>

									</li>
			<li class="sidebar-item">
					<a class="sidebar-link" href="/reservations/checkout/list">
					<i class="align-middle" data-feather="minus"></i> <span class="align-middle">Check-out</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="/settings">
				<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
			</a>
		</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/users">
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
							<a href="/logout" class="btn btn-primary">Sign Out</a>
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
                <img src="images/avatar.jpg" class="avatar img-fluid rounded me-1" alt="" /> <span class="text-dark">hicode</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
						</li>
					</ul>
				</div>
			</nav>

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
									@foreach($room->images as $image)
									<img class="card-img-top" src="{{$image}}" alt="Unsplash">

									@endforeach
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
										<h5 class="card-title mb-0">Code</h5>
										<input type="text" name="code" class="form-control"
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