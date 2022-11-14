@extends('web.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">
					<div class="row" style="margin:auto;">
						<div class="col-md-8 col-xl-9"style="margin:auto;">
							<div class="card" style="border:none">
							<div style="width: 80%;margin:auto; border:none" class="col-12 col-lg-8 col-xxl-9 d-flex" >
							<div class="col-xl-12 col-l-12">
							<div class="card">
								<div class="card-header">
                                    <center>
                                <h1 class="h3 mb-3"><strong>Create Account</strong></h1>
                                </center>
								</div>
								<form action="{{url('/customer/register')}}"  method='POST'>
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
									<button style="width:100%;" type="submit"class="btn btn-primary btn-md">Register</button>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
</main>
@endsection
      
      