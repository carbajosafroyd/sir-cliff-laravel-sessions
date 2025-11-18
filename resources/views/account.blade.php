<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>



   <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('order') }}">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('account') }}">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('settings') }}">Settings</a>
      </li>
    </ul>
  </div>
</nav>

    <div class="p-5 text-dark text-start">
        <h1>Account Page</h1>
        <p>This is your main dashbaord</p>
    </div>

    <div class="container mt-5">

    </div>



</body>

</html>