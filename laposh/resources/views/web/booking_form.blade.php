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
								<form action="{{url('/customer/booking')}}"  method='post' class="form_register">
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
									<div class="card-body">
									<button type="submit"class="read_more" class="form-control"style="margin:auto;">Reserve a Stay</button>
									</div>
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
      
      