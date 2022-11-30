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
						<div class="col-md-4    col-xl-4"style="margin:auto;">
						@if ($errors->has('email'))
										<p class='error'>{{$errors->first('email')}}</p>
										@endif
								<form name="register" action="{{url('/customer/register')}}"  method='POST'class="form_register" onsubmit="return validateform()">
									{{csrf_field()}}
									<div class="row">
									<div class="card-body">
										<h5 class="card-title mb-0">First Name</h5>
										<input type="text"  name="firstName" class="form-control" minlength=3 maxheight=30 required>
									</div>
                                    <div class="card-body">
										<h5 class="card-title mb-0">Last Name</h5>
										<input type="text" name="lastName" class="form-control">
									</div>
									</div>
									
                                    <div class="card-body">
										<h5 class="card-title mb-0">Email</h5>
										<input type="email"  name="email" class="form-control" required>
									</div>
									<div class="row">
                                    <div class="card-body">
										<h5 class="card-title mb-0">Prefered prefix</h5>
										<select name="title" class="form-control">
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Miss.">Miss.</option>
                                        </select>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Birth Date</h5>
										<input type="date"  name="birthdate" class="form-control">
									</div>
									</div>
									<hr/>
									<div>
                                    <h5 id="error" style="color:red;"></h5>
									</div>
									<div class="row">
                                    <div class="card-body">
                                    <h5 class="card-title mb-0">Create Password</h5>
										<input type="password" name="password" class="form-control" minlength=8 maxheight=16 required>
									</div>

                                    <div class="card-body">
                                    <h5 class="card-title mb-0">Confirm Password</h5>
										<input type="password" name="cpassword" class="form-control" minlength=8 maxheight=16 required>
									</div>
                                    <div class="card-body">
										<center>
									<button type="submit"class="read_more">Register</button></center>
                                    </div>
</div>
								</form>
							</div>
						</div>
					</div>
				</div>
</main>
@endsection

      
      