<?php
session_start();

if (isset($_SESSION['user_name'])) {
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f0f2f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1 class="text-center mb-4">Login</h1>
        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo "<div class='alert alert-danger alert-dismissible fade show'>
                    $error
                  </div>";
                
        }
        ?>
        <form action="{{ route('loginvalidate') }}" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                @if($errors->has('email'))
                    <div class="text-danger small mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" >
                 @if($errors->has('password'))
                    <div class="text-danger small mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">LOGIN</button>
            </div>
            @if($errors->has('all'))
                <div class="text-danger small mt-3">{{ $errors->first('all') }}</div>
            @endif

            <div class="text-center small text-muted mt-3">
                       Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                    </div>

            
        </form>

    </div>
</body>

</html>