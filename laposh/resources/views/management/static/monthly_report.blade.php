@extends('management.static.layout')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Annual Financial Report</h1>
					</div>
					<div class="card">
					<div class="row">

						<div class="col-md-4 col-xl-5">
								<div class="card-body h-100">
									<div class="d-flex align-items-start">
											
												<div class="col-6 col-md-6">
													<img src="{{$hotel_data->logo}}" class="img-fluid pe-2" alt="logo">
												</div>
											
                                    </div>
                                </div>

                        </div>

                        <div class="col-md-4 col-xl-5">
						<div class="card-body h-100">
									
                                    <strong>{{$hotel_data->name}}</strong><br/>
									<strong>{{$hotel_data->email}}</strong><br/>
									<strong>{{$hotel_data->phone}}</strong><br/>
									<strong>{{$hotel_data->address}}</strong><br/>
										
                        </div>

</div>              
<div style="padding:10px 10px;">
						<hr />	
</div>			
					</div>

					
                                
						<br/><br/>
                        I,{{auth()->user()->firstName}}&nbsp;{{auth()->user()->lastName}}, confirm that this information is true and have been verified.
						<br/><br/><br/><br/><br/><br/>
                        {{auth()->user()->firstName}} &nbsp;{{auth()->user()->lastName}}
						<br/><br/>
					</div>
                    </div>
				</div>
			</main>
@endsection