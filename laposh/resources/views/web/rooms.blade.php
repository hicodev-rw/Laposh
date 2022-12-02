@extends('web.layout')
@section('content')
      <section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner1.jpg" alt="First slide">
                  <div class="container">
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
         <div class="booking_ocline">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="book_room">
                        <h1>Check Room Availability</h1>
                        <form class="book_now" action="{{url('/list')}}" method="GET">
                           <div class="row">
                              <div class="col-md-12">
                                 <span>Arrival</span>
                                 <img class="date_cua" src="images/date.png">
                                 <input class="online_book" placeholder="dd/mm/yyyy" type="datetime-local" name="check_in_date">
                              </div>
                              <div class="col-md-12">
                                 <span>Departure</span>
                                 <img class="date_cua" src="images/date.png">
                                 <input class="online_book" placeholder="dd/mm/yyyy" type="datetime-local" name="check_out_date">
                              </div>
                              <div class="col-md-12">
                                 <button class="book_btn">Check Availability</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- our_room -->
      <div  class="our_room">
         <div class="room_container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Rooms</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach($rooms as $room)
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img" style="">
                        <figure><img src="{{$room->images[0]}}" alt="{{$room->name}}"/></figure>
                     </div>
                     <div class="bed_room">
                     <h3 style="color:green;">${{$room->price}}/hour</h3>
                        <h3>{{$room->name}}</h3>
                        <a class="read_more" href="/room/details/{{$room->id}}"> Read More</a>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- end our_room -->
@endsection
      
      