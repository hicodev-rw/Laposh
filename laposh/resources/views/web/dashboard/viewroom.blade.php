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
                                    <div class="card" style="padding-left:15px;padding-right:15px;">
									<img class="card-img-top" src="{{$room->images[0]}}" alt="" style="max-height:500px;">
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
										<h5 class="card-title mb-0">Name</h5>
										<input type="text" name="name" class="form-control"
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
									<div>
									<div class="card-body">
									<h5 class="card-title mb-0">Specifications</h5>
									<hr/>
									{{$room->specifications}}
								</div></div>
								</div>
						</div>
					</div>
				<div class="row">
					@foreach($room->images as $image)
					<div class="col-12 col-md-4">
						<div class="card">
							<img class="card-img-top" src="{{$image}}" alt="Unsplash">
						</div>
					</div>
					@endforeach
				</div>
			</main>
@endsection