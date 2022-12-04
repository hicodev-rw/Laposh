@extends('management.static.layout')
@section('content')   
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Messages</strong></h1>

					<div class="row">
						<div class="col-xl-8 col-xxl-6 d-flex">
							<div style="width: 100%; " class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="padding:10px;"  class="card flex-fill">
								@if(session('message'))
						<div class="success">
							{{ session('message') }}
						</div>
					@endif
							<div class="card-header">
								
							</div>
									<table id="example" class="table table-hover my-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Sender</th>
												<th class="d-none d-xl-table-cell">Received At</th>
												<th>Actions</th>
											</tr>
										</thead>
		<tbody>
		@foreach($messages as $message)
			<tr>
				<td>{{$loop->iteration}}</td>
					<td>{{$message->email}}</td>
					<td class="d-none d-xl-table-cell">{{$message->created_at}}</td>
					<td>
					<form action=' {{url('/management/messages' . '/' .   $message->id)}}' method="post">
					{{method_field('DELETE')}}
					{{ csrf_field() }}
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">Actions</span></a>
							 
							<div class="dropdown-menu dropdown-menu-end">
								@if(auth()->user()->role="Administrator")
								<a href="{{ url('/management/messages/'. $message->id .'/edit') }}" class="dropdown-item">Reply</a>
								<a href="{{ url('/management/messages/'. $message->id) }}" class="dropdown-item">View</a>
								<button class="dropdown-item">Delete</button>
								@endif  
							</div>
						</li>
					</ul>
				</form>
	        </td>
				@endforeach
		</tr>
											
	</tbody>
</table>
</div>
</div>
</div>
				<!-- -->
						<div class="col-xl-4 col-l-7">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Message Clients</h5>
								</div>
								<form action="{{url('/management/message/send')}}"  method='post'>
									{{csrf_field()}}
									<div class="card-body">
										<h5 class="card-title mb-0">Subject</h5>
										<input type="text" name="subject" class="form-control">
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Mail</h5>
										<textarea name="mail" class="form-control">
										</textarea>
									</div>

                                    <div class="card-body">
									<button type="submit"class="btn btn-primary btn-md" style="width:100%;">Send</button>
                                    </div>
								</form>
							</div>
						</div>
						<!--  -->
					</div>

			

					<div class="row">

						
					</div>

				</div>
			</main>
@endsection
