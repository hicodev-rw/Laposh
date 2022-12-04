@extends('management.static.layout')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Message form {{$message->email}}</strong></h1>
</div>
<div class="col-xl-5 col-l-7" style="margin:auto;">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Message Clients</h5>
								</div>
								<form action="{{url('/management/messages/reply')}}"  method='post'>
									{{csrf_field()}}
                                    <div class="card-body">
										<h5 class="card-title mb-0">Receiver</h5>
										<input type="email" name="to" class="form-control" value="{{$message->email}}" readonly>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Subject</h5>
										<input type="text" name="subject" class="form-control" required>
									</div>

									<div class="card-body">
										<h5 class="card-title mb-0">Mail</h5>
										<textarea name="mail" class="form-control" required>
										</textarea>
									</div>

                                    <div class="card-body">
									<button type="submit"class="btn btn-primary btn-md" style="width:100%;">Send</button>
                                    </div>
								</form>
							</div>
						</div>
</main>
@endsection