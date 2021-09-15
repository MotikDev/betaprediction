<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Beta Prediction</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</head>
<body>
  
  @include ('layout.nav');

  <div class="container">
    @include ('post.messages')
    <div class="row">
      <div class="col-sm-12 col-md-3">
        <br>
        <div class="well">
          <ul style="list-style-type:none">
              <li style="margin-bottom:3%"> <a href="{{ route('home') }}" class="btn btn-info"> Dashboard </a> </li>
              <li style="margin-bottom:3%"> <a href="{{ route('comments') }}" class="btn btn-info">Comments</a></li>
              <li style="margin-bottom:3%"> <a href="{{ route('post.index')}}" class="btn btn-info"> Post Index </a></li>
              <li style="margin-bottom:3%"> <a href="{{ route('post.create')}}" class="btn btn-info">  Create Post </a></li>
          </ul>
      </div>
      </div>

      <div class="col-sm-0 col-md-9">
        <br>
        @yield ('maincontent')
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 col-md-12 text-center">
        This website is copyrited &copy; 2019 to Beta Prediction
      </div>
    </div>    

  </div>


</body>
</html>