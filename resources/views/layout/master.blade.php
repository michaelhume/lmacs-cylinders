<!DOCTYPE html>

<html lang="en" class="h-100">

<head>

@include('cylinders::layout.partials.head')

</head>


<body class="d-flex flex-column h-100">

  @include('cylinders::layout.partials.nav')

<main role="main" class="flex-shrink-0">

  <div class="container">

      @yield('content')
  
  </div>

</main>

@include('cylinders::layout.partials.footer')

@include('cylinders::layout.partials.footer-scripts')

</body>

</html>