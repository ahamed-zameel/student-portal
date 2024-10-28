<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sale</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1>Add Sale</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.add') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Product:</label>
            <select name="product_id" id="product_id" class="form-select" required>
                <option value="">Select a product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="sold_quantity" class="form-label">Sold Quantity:</label>
            <input type="number" name="sold_quantity" id="sold_quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date:</label>
            <input type="date" name="sale_date" id="sale_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Sale</button>
    </form>

    <a href="{{ route('sales.list') }}" class="btn btn-secondary mt-3">Back to Sales List</a>
</div>

</body>
</html>
