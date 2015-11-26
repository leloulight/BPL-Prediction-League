<!DOCTYPE html>
<html class="{{ $view_name }}" lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body class="{{ $view_name }}">
  @yield('content')

  <footer>
      <div class="row">
        <p>&copy; Copyright Ryan Hipkiss <?php echo date('Y') ?></p>
      </div>
  </footer>
</body>
</html>
