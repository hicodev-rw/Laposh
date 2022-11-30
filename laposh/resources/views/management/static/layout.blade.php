<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>La Posh Hotel</title>
	<link rel="stylesheet" href="{{ URL::asset('css/error.css'); }}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>    
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
						<a class="sidebar-link" href="/management/dashboard">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/management/rooms">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Rooms</span>
            </a>
		</li>
		<li class="sidebar-item">
	<a class="sidebar-link" href="/management/categories">
<i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Categories</span>
</a>
<li class="sidebar-item">
        <a class="sidebar-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="align-middle" data-feather="book"></i><span>Reservations</span><i data-feather="chevron-down"></i>
        </a>
        <ul style="margin-left:20px;"id="components-nav1" class="sidebar-nav collapse " data-bs-parent="#sidebar-nav">
		<li class="sidebar-item">
						<a class="sidebar-link" href="/management/booking/pending">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Pending Bookings</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/management/booking/ongoing">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Ongoing Bookings</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/management/booking/closed">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Closed Bookings</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/management/booking/unpaid">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">With pending payment</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/management/booking/cancelled">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Cancelled Bookings</span>
            </a>
					</li>
        </ul>
      </li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/management/check-in-list">
					<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Check-in</span>
					</a>
										</li>

									</li>
			<li class="sidebar-item">
					<a class="sidebar-link" href="/management/check-out-list">
					<i class="align-middle" data-feather="minus"></i> <span class="align-middle">Check-out</span>
				</a>
			</li>
			@if(auth()->user()->role=='Administrator')
			<li class="sidebar-item">
				<a class="sidebar-link" href="/management/roles">
				<i class="align-middle" data-feather="folder"></i> <span class="align-middle">Configurations</span>
			</a>
		</li>
		<li class="sidebar-item">
				<a class="sidebar-link" href="/management/settings">
				<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
			</a>
		</li>
		<li class="sidebar-item">
        <a class="sidebar-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
          <i class="align-middle" data-feather="users"></i><span>Users</span><i data-feather="chevron-down"></i>
        </a>
        <ul style="margin-left:20px;" id="components-nav3" class="sidebar-nav collapse " data-bs-parent="#sidebar-nav">
		<li class="sidebar-item">
						<a class="sidebar-link" href="/management/users">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Management</span>
            </a>
					</li>
		<li class="sidebar-item">
						<a class="sidebar-link" href="/management/clients">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Clients</span>
            </a>
		</li>
        </ul>
      </li>

@endif
<li class="sidebar-item">
        <a class="sidebar-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="align-middle" data-feather="edit"></i><span>Reports</span><i data-feather="chevron-down"></i>
        </a>
        <ul style="margin-left:20px;" id="components-nav2" class="sidebar-nav collapse " data-bs-parent="#sidebar-nav">
		<li class="sidebar-item">
						<a class="sidebar-link" href="/management/reports/financial">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Financial</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/management/reports/data/weekly">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Data weekly</span>
            </a>
		</li>
		<li class="sidebar-item">
						<a class="sidebar-link" href="/management/reports/data/monthly">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Data monthly</span>
            </a>
		</li>
		<li class="sidebar-item">
						<a class="sidebar-link" href="/management/reports/data/annual">
              <i class="align-middle" data-feather="maximize"></i> <span class="align-middle">Data Annual</span>
            </a>
		</li>
        </ul>
      </li>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">{{ auth()->user()->lastName }}</strong>
						<div class="mb-3 text-sm">
						{{ auth()->user()->role }}
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
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="{{ auth()->user()->avatar }}" width="36" height="36" class="rounded-circle me-2" alt="" /> <span class="text-dark">{{ auth()->user()->lastName }}</span>
                 </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="/management/user/profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
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
	<srcipt>
<script>  
$('table').DataTable();  
</script> 
</script>
</body>
</html>