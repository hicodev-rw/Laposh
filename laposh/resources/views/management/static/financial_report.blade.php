@extends('management.static.layout')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Annual Financial Report</h1>
					</div>
					<div class="row">

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-body h-100">
									<div class="d-flex align-items-start">
											<div class="row g-0 mt-0">
												<div class="col-6 col-md-4">
													<img src="{{$hotel_data->logo}}" class="img-fluid pe-2" alt="logo">
												</div>
											</div>
                                        <div class="border text-sm text-muted p-2 mt-1">
                                        {{$hotel_data->name}}
										</div>
										</div>
									</div>

									<hr />
                                    <table class="table table-hover my-0">
										<thead>
                                            @foreach($data as $data)
											<tr>
												<th>{{$data['month']}}</th>
												<th>$ {{$data['sum']}}</th>
                                                
											</tr>
                                            @endforeach
                                            <tr>
                                            <th>Total</th>
												<th>$ {{$payment_total}}</th>
                                           </tr>
										</thead>
                                        
</table>
						
                        I,{{auth()->user()->firstName}}&nbsp;{{auth()->user()->lastName}}, confirm that this information is true and have been verified.

                        {{auth()->user()->firstName}} &nbsp;{{auth()->user()->lastName}}
					</div>
                    </div>
				</div>
			</main>
@endsection