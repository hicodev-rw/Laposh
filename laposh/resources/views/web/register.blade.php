@extends('web.layout')
@section('content')
			<main class="content">
				<div class="our_room">
					<div class="row" style="margin:auto;">
					<div class="col-md-6 col-xl-6">
					<div class="titlepage">
                    
					<p class="margin_0">lorem ipsum</p>
				 </div>
						</div>
						<div class="col-md-6    col-xl-6"style="margin:auto;">
								<form action="{{url('/customer/register')}}"  method='POST'class="form_register">
									{{csrf_field()}}
									<div class="card-body">
										<h5 class="card-title mb-0">First Name</h5>
										<input type="text"  name="firstName" class="form-control" required>
									</div>
                                    <div class="card-body">
										<h5 class="card-title mb-0">Last Name</h5>
										<input type="text" name="lastName" class="form-control" required>
									</div>
                                    <div class="card-body">
										<h5 class="card-title mb-0">Email</h5>
										<input type="email"  name="email" class="form-control" required>
									</div>
                                    <div class="card-body">
										<h5 class="card-title mb-0">Prefered itle</h5>
										<select name="title" class="form-control">
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Miss.">Miss.</option>
                                        </select>
									</div>

                                    <hr/>
                                    <div class="card-body">
                                    <h5 class="card-title mb-0">Create Password</h5>
										<input type="password" name="password" class="form-control" required>
									</div>
                                    <div class="card-body">
                                    <h5 class="card-title mb-0">Confirm Password</h5>
										<input type="password" name="cpassword" class="form-control" required>
									</div>
                                    <div class="card-body">
										<center>
									<button type="submit"class="read_more">Register</button></center>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
</main>
@endsection
      
      