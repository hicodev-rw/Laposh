@extends('web.layout')
@section('content')
			<main class="content">
				<div class="container-fluid p-0">
					<div class="row" style="margin:auto;">
						<div class="col-md-8 col-xl-9"style="margin:auto;">
							<div class="card" style="border:none">
							<div style="width: 80%;margin:auto" class="col-12 col-lg-8 col-xxl-9 d-flex" >
							<div class="col-xl-12 col-l-12">
							<div class="card flex-fill">
								<div class="card-header">
                                <h1 class="h3 mb-3"><strong>Reservation form</strong></h1>
								</div>
								<form action="{{url('/customer/booking')}}"  method='post'>
									{{csrf_field()}}
                                    <input type="number" value="{{auth()->user()->id}}" name="user_id" class="form-control" hidden>
                                    <input type="number" value="{{$id}}" name="room_id" class="form-control" hidden>
									<div class="card-body">
										<h5 class="card-title mb-0">Check in date</h5>
										<input type="date" value="" name="check_in_date" id="cindate" class="form-control" readonly>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Check out date</h5>
										<input type="date" value=""name="check_out_date" id="coutdate" class="form-control" readonly>
									</div>
									<div class="card-body">
										<h5 class="card-title mb-0">Special information</h5>
										<textarea type="email" value="" name="special_info" class="form-control">
                                        </textarea>
									</div>

									<button type="submit"class="btn btn-primary btn-md">Reserve a Stay</button>
								</form>
							</div>
						</div>
					</div>
				</div>
</main>
<script>
   document.getElementById('cindate').value=localStorage.getItem('cindate');
   document.getElementById('coutdate').value=localStorage.getItem('coutdate');
         </script>
@endsection
      
      