@extends('management.static.layout')
@section('content')
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
                                    <div class="card">
									<img class="card-img-top" src="{{$room->images[0]}}" alt="Unsplash">
                                    </div>
								</div>
							</div>
							</div>
                            <div class="col-xl-4 col-l-7">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Add New Room</h5>
								</div>
								<form action="{{url('management/room/images/'.$room->id)}}"  method='post' enctype="multipart/form-data">
									{{csrf_field()}}
                                    <div class="card-body">
										<h5 class="card-title mb-0">Image (s)</h5>
										<input type="file" name="images[]" class="form-control" multiple required>
									</div>
									<button type="submit"class="btn btn-primary btn-md" style="width:100%">update</button>
								</form>
							</div>
						</div>
					</div>
			

					<div class="row">

						
					</div>

				</div>
			</main>
@endsection