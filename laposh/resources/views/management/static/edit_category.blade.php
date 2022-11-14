@extends('management.static.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Room Categories</strong></h1>

					<div class="row">
						<div class="col-xl-8 col-xxl-2 d-flex">
							<div style="width: 100%;" class="col-12 col-lg-8 col-xxl-9 d-flex" >
								<div style="width: 90%;"  class="card flex-fill">
									<div class="card-header">
	
										<h5 class="card-title mb-0">Categories</h5>
									</div>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($categories as $category)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$category->name}}</td>
												<td class="d-none d-xl-table-cell">
												<form action=' {{url('/categories' . '/' .   $category->id)}}' method="post">
													{{method_field('DELETE')}}
													{{ csrf_field() }} 
												<a href="{{url('categories/' .$category->id .'/edit')}}"class="btn btn-primary btn-sm">Edit</a>
												<a href="{{url('categories/'.$category->id)}}"class="btn btn-primary btn-sm">View</a>
                                                    <button class="btn btn-danger btn-sm">Delete</button>
													</form>

												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							</div>
						<div class="col-xl-4 col-l-7">
							<div class="card flex-fill" style="background-color:#dee2e6">
								<div class="card-header">

									<h5 class="card-title mb-0">Update {{$category->name}} Category</h5>
								</div>
								<form action="{{ url('management/categories/'.$category->id) }}" method='post'>
									{{ csrf_field() }}
									@method("PATCH")
									<div class="card-body">
										<h5 class="card-title mb-0">Name</h5>
										<input type="text" name="name" 
										value="{{$category->name}}"
										class="form-control">
									</div>

									<button type="submit" class="btn btn-primary btn-md">Update</button>
								</form>
							</div>
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Add New</h5>
								</div>
								<form action="{{ url('management/categories') }}" method='post'>
									{{ csrf_field() }}
									<div class="card-body">
										<h5 class="card-title mb-0">Name</h5>
										<input type="text" name="name" 
										class="form-control">
									</div>

									<button type="submit" class="btn btn-primary btn-md">Save</button>
								</form>
							</div>
						</div>
					</div>

			

					<div class="row">

						
					</div>

				</div>
			</main>
@endsection