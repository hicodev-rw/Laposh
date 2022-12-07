@extends('web.layout')
@section('content')
<!-- CSS only -->
			<main class="content">
				<div class="our_room">
					<div class="row" style="margin:auto;">
						<div class="col-md-8  col-xl-8 form_register"style="margin:auto;">
						<div class="row">
						<div class="col-md-7 col-xl-7">
							<center>
						<h2 class="card-title mb-0"><strong>Create Account</strong></h2></center>
						@if ($errors->has('email'))
										<p class='error'>{{$errors->first('email')}}</p>
										@endif
								<form name="register" action="{{url('/customer/register')}}"  method='POST' onsubmit="return validateform()">
									{{csrf_field()}}
									<div>
                                    <h5 id="err" class="err"></h5>
									</div>
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
                                    <h5 id="error" class="err"></h5>
									</div>
									<div class="row">
                                    <div class="card-body">
                                    <h5 class="card-title mb-0">Create Password</h5>
										<input type="password" name="password" class="form-control" minlength=8  id="password" maxheight=16 required>
									</div>

                                    <div class="card-body">
                                    <h5 class="card-title mb-0">Confirm Password</h5>
										<input type="password" name="cpassword" id="cpassword" class="form-control" minlength=8 maxheight=16 required>
									</div>
									</div>
                                    <div class="card-body">
										<center>
									<button type="submit"class="read_more">Register</button></center>
                                    </div>
									</form>
									</div>

									<div class="col-md-5 col-xl-5" style="margin-top:150px;padding:50px">
									<img width="500" height="200" border="0" style="display: block; width: 500px;" src="https://res.cloudinary.com/dcwfma8py/image/upload/v1670142882/ceu73lxfqjubidlxjfju.png" alt="" />
									<div><strong><h6 style="color:black;">The data you provide will be secured and kept secret!</h6></strong></div>
									</div>
									</div>
							</div>
						</div>
					</div>
				</div>
</main>
@endsection

      
      