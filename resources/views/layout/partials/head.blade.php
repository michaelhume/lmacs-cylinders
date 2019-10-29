<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Jekyll v3.8.5">
<title>{{ env('APP_NAME') }} - ( {{ env('APP_ENV') }} )</title>

@if ( env('APP_ENV') == 'offline' )

<!-- local dev version -->
<link rel="stylesheet" href="/css/bootstrap.min.css" >

@else

<!-- Bootstrap core CSS --> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

@endif


<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  
  main > .container {
  	padding: 100px 15px 0;
  }
	
  .footer {
  	background-color: #f5f5f5;
  }

  .footer > .container {
  	padding-right: 15px;
  	padding-left: 15px;
  }

  code {
  	font-size: 80%;
  }
</style>

@yield('head')
