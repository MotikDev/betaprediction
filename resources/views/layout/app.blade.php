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

    @yield ('jumbotron');

  

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        @include ('post.messages')
        @yield ('content')
      </div>

      <div class="clearfix visible-xs visible-sm"></div>

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        @yield ('sidebar')
      </div>
    </div>

    <div class="row">
      
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="panel panel-default clearfix" style="padding:1%">
            @section ('comments')

            @show
        </div>
        

          <br><br><br>

      </div>

      <div class="clearfix visible-xs visible-sm"></div>

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
      </div>
    </div>

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