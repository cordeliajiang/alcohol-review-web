<!DOCTYPE html>
<html>
  <head>
    <!-- child pages will overwrite, refer to the position where yield sits and define their own specific title -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- scripts and stylesheets used for dropdown list functionality -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <div class="container-fluid">
        <a class="navbar-brand">Alcohol Review</a>
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item px-3">
            <a class="nav-link active" href="{{url("item")}}">Home</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link active" href="{{url("documentation")}}">Documentation</a>
          </li>

        </ul>
        <!-- if is logged in, displaying username and user type, and logout button-->
        @auth
          <ul class="d-flex justify-content-end">
            <h5 class="nav-item" style="color:white; margin-right:40px;">{{Auth::user()->name}} - {{Auth::user()->type}}</h5>
            <li>
              <a>
                <form class="form-inline" method="POST" action="{{url('/logout')}}">
                  {{csrf_field()}}
                  <button class="btn btn-primary btn-md" type="submit" value="Logout">Logout<i class="icon-signout"></i></button>
                </form>
              </a>
            </li>
          </ul>
        <!-- if is not logged in, display login and register buttons -->
        @else
          <ul class="d-flex justify-content-end">
            <li class="nav-item px-3"><a href="{{route('login')}}">Login</a></li>
            <li class="nav-item px-3"><a href="{{route('register')}}">Register</a></li>
          </ul>
        @endauth
      </div>
    </nav>
    <!-- default content will be overwritten if user parse in a variable name -->
    @yield('content')
  </body>
</html>