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
        <a class="nav-link active" href="{{ route('order') }}">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('account') }}">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('settings') }}">Settings</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <h2 class="mb-0">Orders</h2>
          <small class="text-muted">Manage your orders below</small>
        </div>
        <div>
          <a href="{{ route('add_order') }}" class="btn btn-sm btn-light border">+ Add Order</a>
        </div>
      </div>

      @if (isset($orders) && $orders->count())
        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col">Created</th>
                <th scope="col" class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->product }}</td>
                  <td>{{ $order->quantity }}</td>
                  <td>${{ number_format($order->price, 2) }}</td>
                  <td>${{ number_format(($order->price ?? 0) * ($order->quantity ?? 0), 2) }}</td>
                  <td class="text-muted small">{{ optional($order->created_at)->format('Y-m-d') }}</td>
                  <td class="text-end">
                    <a href="/orders/{{ $order->id }}/edit" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                    <form action="/orders/{{ $order->id }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this order?');">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{-- Pagination placeholder --}}
        @if(method_exists($orders, 'links'))
          <div class="mt-3">{{ $orders->links() }}</div>
        @endif

      @else
        <div class="card border-0 shadow-sm p-4">
          <div class="text-center py-4">
            <p class="mb-1">No orders yet.</p>
            <a href="{{ route('add_order') }}" class="btn btn-sm btn-primary">Create your first order</a>
          </div>
        </div>
      @endif

    </div>



</body> 

</html>