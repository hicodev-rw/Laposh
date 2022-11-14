<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>La Posh Hotel</title>

	<link href="{{ URL::asset('css/app.css'); }}" rel="stylesheet">
	<link href="{{ URL::asset('css/custom.css'); }}" rel="stylesheet">
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
						<a class="sidebar-link" href="/">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
            </a>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/customer/dashboard">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
		<li class="sidebar-item">
			<a class="sidebar-link" href="/customer/bookings">
  <i class="align-middle" data-feather="book"></i> <span class="align-middle">Reservations</span>
</a>
				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">{{ auth()->user()->lastName }}</strong>
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
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="{{ auth()->user()->avatar }}" width="36" height="36" class="rounded-circle me-2" alt="" /> <span class="text-dark">{{ auth()->user()->lastName }}</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="/customer/profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
						</li>
					</ul>
				</div>
			</nav>
            @yield('content')

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

	<script src="{{ URL::asset('js/app.js'); }}"></script>
	
	
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now());
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>
</body>
</html>