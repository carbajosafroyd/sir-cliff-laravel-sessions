<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f7f7f8; }
        .card { border: none; border-radius: 12px; }
        .form-container { max-width: 520px; width: 100%; }
    </style>
</head>
<body>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="form-container">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h4 class="mb-3 text-center">Edit Order</h4>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/orders/update" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{ $order->id ?? old('id') }}">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="product" name="product" placeholder="Product" value="{{ old('product', $order->product ?? '') }}" required>
                        <label for="product">Product</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" min="1" value="{{ old('quantity', $order->quantity ?? 1) }}" required>
                        <label for="quantity">Quantity</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="0.00" value="{{ old('price', $order->price ?? '') }}" required>
                        <label for="price">Price (USD)</label>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1">Save Changes</button>
                        <a href="/order" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center mt-3 small text-muted">Changes are saved securely.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>