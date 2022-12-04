@extends('web.layout')
@section('content')
      <!-- end header inner -->
      <!-- end header -->
     <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                      <h3>Contact Us</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="form_register" action="{{url('contact')}}" method="POST">
                  {{csrf_field()}}
                     <div class="column">
                     <div class="card-body">
										<h5 class="card-title mb-0">Email</h5>
										<input type="email"  name="email" class="form-control" required>
									</div>
                           <div class="card-body">
										<h5 class="card-title mb-0">Message</h5>
										<textarea style="width:100%;" placeholder=" type your message here" type="type" name="content" required></textarea>
									</div>
                        <div class="col-md-12">
                           <button class="read_more" type="submit">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18967.84876683927!2d30.049295071682746!3d-1.9537172195575534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca425bcd3250b%3A0x76f9173cdae429a3!2sLa%20Posh%20Hotel!5e0!3m2!1sen!2srw!4v1670012494911!5m2!1sen!2srw" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
     @endsection