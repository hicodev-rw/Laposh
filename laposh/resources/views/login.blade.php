<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>La posh hotel / Login</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="{{ URL::asset('css/login.css'); }}">

</head>
<body>
<section class='login' id='login'>
  <div class='head'>
  <h1 class='company'>{{$info->name}}</h1>
  </div>
  <p class='msg'>Welcome back</p>
  @if ($errors->has('email'))
  <p class='error'>{{$errors->first('email')}}</p>
  @endif
  <div class='form'>
    <form action="{{ url('/login') }}" method="POST">
    {{csrf_field()}}
  <input type="text" placeholder='username' class='text' name='email' required><br>
  <input type="password" placeholder='password' class='password' name='password' required><br>
  <button type="submit" class='btn-login'>Login</button>
  <a href="#" class='forgot'>Forgot?</a>
    </form>

  </div>
  <br><br>
<a href="/register" class='forgot'>Register</a>
<a href="/" class='forgot'>Home&nbsp;|&nbsp;</a>
</section>
<footer>

</footer>
<!-- partial -->
</body>
</html>
