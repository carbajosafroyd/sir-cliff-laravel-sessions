<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h4 class="mb-3 text-center">Add Order</h4>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('orders.store') }}" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" id="category" class="form-select" required>
                            <option value="">Choose...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" value="{{ old('item_name') }}" required>
                        <label for="item_name">Item Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" min="1" value="{{ old('quantity', 1) }}" required>
                        <label for="quantity">Quantity</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="0.00" value="{{ old('price') }}" required>
                        <label for="price">Price (USD)</label>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1">Add Order</button>
                        <a href="/order" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center mt-3 small text-muted">Orders are saved securely.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>