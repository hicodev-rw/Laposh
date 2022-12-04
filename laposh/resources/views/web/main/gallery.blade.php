@extends('web.layout')
@section('content')
      <!-- our_room -->
      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Gallery</h2>
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
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- end our_room -->
@endsection
      
      