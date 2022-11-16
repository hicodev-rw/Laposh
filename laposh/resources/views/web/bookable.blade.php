@extends('web.layout')
@section('content')
      <div class="about">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-5">
                  <div class="titlepage">
                    <h3>{{$room->name}}</h3>
                     <p>{{$room->specifications}} </p>
                     <p>price: {{$room->price}} $/day </p>
                     <a class="read_more" href="/room/reserve/{{$room->id}}">Book Now</a>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="detail_img">
                     <figure><img src="{{$room->images[0]}}" alt="#"/></figure>
                  </div>
               </div>
            </div>

      <!-- end room details -->
      <!-- room images -->
      <div  class="our_room">
         <div class="container">
            <div class="row">
               @foreach($room->images as $image)
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="{{$image}}" alt="{{$room->name}}"/></figure>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      </div>
      </div>
      <!-- end room -->
@endsection