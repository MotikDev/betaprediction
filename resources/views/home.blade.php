<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Beta Prediction</title>
  
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</head>
<body>
  
  <div class="container">
    @include ('layout.nav');
    <br><br><br><br>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            
          <!--('sidebar')-->
            <div class="well">
                <ul style="list-style-type:none">
                    <li style="margin-bottom:3%"> <a href="{{ route('home') }}" class="btn btn-info active"> Dashboard </a> </li>

                    @if (Auth::id()==1)
                        <li style="margin-bottom:3%"> <a href="{{ route('comments') }}" class="btn btn-info">Comments</a></li>
                        <li style="margin-bottom:3%"> <a href="{{ route('post.index')}}" class="btn btn-info"> Post Index </a></li>
                        <li style="margin-bottom:3%"> <a href="{{ route('post.create')}}" class="btn btn-info">  Create Post </a></li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="clearfix visible-xs visible-sm"></div>

      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
    
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <h3>Our subscription is free and it gives you access to the "Rollover" page.</h3>
                    </div>
            </div>



            <div class="panel panel-default">
              <div class="panel-heading"><h3>Your Comments</h3>
              </div>

              <div class="panel-body">
                  @foreach ($comments as $comment)
                      <div class="media">
                          <a class="pull-left " href="#">
                              <img class="media-object" src="{{ asset('img/noImage1.jpg') }}">
                          </a>
                          <div class="media-body">
                              <h4 class="media-head"> {{ $comment->userName }} <small> &nbsp; on &nbsp; {{ date('Y/m/d', strtotime($comment->created_at)) }}</small></h4>
                              
                              <p>{{ $comment->body }}</p>
                          </div>         
                      </div>               

                      <hr>
                  @endforeach
                  <br>
                  
                @yield ('comments')        
              </div>
            </div>








            
            

      </div>

    </div>





    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br>
    <div class="row" id="footer1">

      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h3><strong>Information</strong></h3>
        <h5>Terms and Conditions</h5>
        <h5>Disclaimer</h5>
        <h5>Contact Us</h5>
      </div>

      <div class="clearfix visible-xs visible-sm"></div>

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <hr class="visible-xs visible-sm">
        <h3><strong>Contact Information</strong></h3>
        <h5>Enquiries: motik.kuye@outlook.com</h5>
        <h5>Adverts: advert@betaprediction.com</h5>

        <img src="{{asset('img/linkedin icon.jpg')}}" alt="Linkedin Logo" height="10%" width="10%" class="pull-left visible-xs visible-sm img-responsive" style="padding-top:0.5%;">
        <img src="{{asset('img/facebooklogo.png')}}" alt="Facebook Logo" height="8%" width="8%" class="pull-left visible-xs visible-sm img-circle img-responsive" style="padding:0.5%;">
        <img src="{{asset('img/twitterlogo.png')}}" alt="Twitter Logo" height="8%" width="8%" class="pull-left visible-xs visible-sm img-circle img-responsive" style="padding:0.5%;">


        <img src="{{asset('img/linkedin icon.jpg')}}" alt="Linkedin Logo" height="10%" width="10%" class="pull-left visible-md visible-lg img-responsive" style="padding-top:0.5%;">
        <img src="{{asset('img/facebooklogo.png')}}" alt="Facebook Logo" height="8%" width="8%" class="pull-left visible-md visible-lg img-circle img-responsive" style="padding:0.5%;">
        <img src="{{asset('img/twitterlogo.png')}}" alt="Twitter Logo" height="8%" width="8%" class="pull-left visible-md visible-lg img-circle img-responsive" style="padding:0.5%;">
      </div>

    </div>

    <div class="row" id="footer2">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p class="text-danger">
            This site was programmed by: Kuye Omotayo Isaiah 
            <img src="{{asset('img/linkedin icon.jpg')}}" alt="Linkedin Logo" height="3%" width="3%" class="pull-right visible-md visible-lg" style="padding-top:0.5%;">
            <img src="{{asset('img/facebooklogo.png')}}" alt="Facebook Logo" height="3%" width="3%" class="pull-right visible-md visible-lg img-circle" style="padding:0.5%;">
            <img src="{{asset('img/twitterlogo.png')}}" alt="Twitter Logo" height="3%" width="3%" class="pull-right visible-md visible-lg img-circle" style="padding:0.5%;">
        </p>
        
      </div>

      <div class="clearfix col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <span><img src="{{asset('img/linkedin icon.jpg')}}" alt="Linkedin Logo" height="12%" width="12%" class="visible-xs visible-sm img-rounded pull-left" style="padding:1%;"></span>     
        <span><img src="{{asset('img/facebooklogo.png')}}" alt="Facebook Logo" height="9%" width="9%" class="visible-xs visible-sm img-circle pull-left" style="padding:1%;"></span>
        <span><img src="{{asset('img/twitterlogo.png')}}" alt="Twitter Logo" height="9%" width="9%" class="visible-xs visible-sm img-circle pull-left" style="padding:1%;"></span>
      </div>
      
    </div>    

  </div>


</body>
</html>