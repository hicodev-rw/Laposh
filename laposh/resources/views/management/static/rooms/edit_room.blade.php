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
								<form action="{{url('/management/rooms/'.$room->id)}}"  method='post' enctype="multipart/form-data">
									{{csrf_field()}}
                                    @method('PATCH')
									<div class="card-body">
										<h5 class="card-title mb-0">Name</h5>
										<input type="text" name="name" 
                                        value="{{$room->name}}"
                                        class="form-control" required>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Category</h5>
										<select name="category_id" class="form-control" required>
											@foreach($category as $cat)
										<option value="{{$cat->id}}">{{$cat->name}}</option>
										@endforeach
										</select>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Price ($)</h5>
										<input type="number" name="price" 
                                        value="{{$room->price}}"
                                        class="form-control" required>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Specifications</h5>
										<textarea type="text" name="specifications"
                                        class="form-control"required>
										{{$room->specifications}}
										</textarea>
									</div>
									<button type="submit"class="btn btn-primary btn-md" style="width:100%;">update</button>
								</form>
                                <br>
                                <a href="/management/edit-room-images/{{$room->id}}"class="btn btn-primary btn-md">Change room Images</a>
							</div>
						</div>
					</div>
			

					<div class="row">

						
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