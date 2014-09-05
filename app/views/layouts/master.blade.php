<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/css/no-more-tables.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    {{ HTML::script('assets/js/bootstrap.js') }}

    
    <script type="text/javascript">
    $(document).ready(function () {
     
   
    //$("#notification").fadeIn(200, function () { $("#notification").delay(3000).fadeOut(200) })
  });
  </script>
  </head>
  <body id="home">
  
  <!-- Start Nav Bar -->
  @if (!Auth::check())
	<div class="nav-bar">
    @include('layouts.topnav')
	</div>
  @endif
  <!-- End Nav Bar -->


  	<div class="container" style="margin-top: 10px;">

	  	<div class="row">
	  	<div class="col-md-12">

        @if (Auth::check())
          @if (Auth::user()->role=='admin')
            @include('layouts.subnavadmin')
          @else
             @include('layouts.subnav')
          @endif
        @endif
        
	  	</div>
	  	</div>
      {{$main}}
      
  	</div>

  </body>
</html>