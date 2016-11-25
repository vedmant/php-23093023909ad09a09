<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Admin Panel :: Homework</title>

   <!-- Fonts -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

   <!-- Styles -->
   <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

   <!-- Scripts -->
   <script>
      window.Laravel = <?php echo json_encode([
         'csrfToken' => csrf_token(),
      ]); ?>
   </script>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
   <div class="container">
      <div class="navbar-header">

         <!-- Collapsed Hamburger -->
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>

         <!-- Branding Image -->
         <a class="navbar-brand" href="{{ url('/') }}">
            Homework Admin panel
         </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
         <!-- Left Side Of Navbar -->
         <ul class="nav navbar-nav">
            <li><a href="{{ url('/admin/booking') }}">Booking</a></li>
            <li><a href="{{ url('/admin/customer') }}">Customer</a></li>
            <li><a href="{{ url('/admin/cleaner') }}">Cleaner</a></li>
            <li><a href="{{ url('/admin/city') }}">City</a></li>
         </ul>

         <!-- Right Side Of Navbar -->
         <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
               </a>

               <ul class="dropdown-menu" role="menu">
                  <li>
                     <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                        Logout
                     </a>

                     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                     </form>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>