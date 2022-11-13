@extends('web.layout')
@section('content')
      <!-- our_room -->
      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
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
                     <h3>{{$room->price}} $ /day</h3>
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
     
      <!-- blog -->
      <div  class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Popular</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach($rooms as $room)
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="{{$room->images[0]}}" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>{{$room->name}}</h3>
                        <span>{{$room->category->name}}</span>
                        <a class="read_more" href="/room/details/{{$room->id}}"> Read More</a>
                     </div>
</div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
@endsection
      
      