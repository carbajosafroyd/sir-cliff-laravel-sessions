<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f7f7f8; }
        .card { border: none; border-radius: 12px; }
        .form-container { max-width: 420px; width: 100%; }
    </style>
</head>
<body>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="form-container">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h4 class="mb-3 text-center">Create an account</h4>

                <form method="POST" action="{{ route('registervalidate') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" >
                        @if($errors->has('name'))
                            <div class="text-danger small mt-1">{{ $errors->first('name') }}</div>
                        @endif
                        <label for="name">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" >
                        @if($errors->has('email'))
                            <div class="text-danger small mt-1">{{ $errors->first('email') }}</div>
                        @endif
                        <label for="email">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                        @if($errors->has('password'))
                            <div class="text-danger small mt-1">{{ $errors->first('password') }}</div>
                        @endif
                        <label for="password">Password</label>
                    </div>

                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>

                    <div class="text-center small text-muted">
                        Already have an account? <a href="{{ route('login'  ) }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center mt-3 small text-muted">By registering you agree to our terms.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>