<!DOCTYPE html>
<html class="{{ $view_name }}" lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body class="{{ $view_name }}">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <a href="{{ URL::to('/home') }}">
        <img src="http://placehold.it/100x50">
    </a>
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
        <div class="col-md-4">
            <ul class="nav nav-pills nav-stacked">
              <li role="presentation"><a href="{{ URL::to('/home') }}">Home</a></li>
              <li role="presentation"><a href="{{ URL::to('/previous') }}">Previous Fixtures</a></li>
              <li role="presentation"><a href="{{ URL::to('/current') }}">This Week</a></li>
            </ul>
        </div>
        <div class="col-md-8">
            @yield('content')
        </div>
    </div>

  <footer>
      <div class="row">
        <p>&copy; Copyright Ryan Hipkiss <?php echo date('Y') ?></p>
      </div>
  </footer>
</body>
</html>
