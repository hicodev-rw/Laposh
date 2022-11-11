<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/login.css" rel="stylesheet">

</head>
<body id="body">

<div id="login-card" class="card">
<div class="card-body">
  <h2 class="text-center">Login form</h2>
  <br>
  <form action="{{url('/login')}}" method="POST">
  {{csrf_field()}}
    <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="email" placeholder="Enter password" name="password">
    </div>
    <button type="submit" id="button" class="btn btn-primary deep-purple btn-block ">Submit</button>
<br>
    <br>
   
    <div id="btn" class="text-center">
   <button type="button" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-facebook"></i></button>
   <button type="button" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-google"></i></button>
   <button type="button" class="btn btn-info btn-circle btn-sm"><i class="fa fa-twitter"></i></button>
   </div>

  </form>
</div>
<div>