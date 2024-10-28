
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1>Sales List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ url('sales-add') }}" style="float: right; font-size: 14px;" class="btn btn-success mb-3">ADD Product</a>
    <a href="{{ route('export') }}" class="btn btn-success mb-3">Export</a>
    <a href="{{ url('import') }}" class="btn btn-success mb-3">Import</a>
    
    

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Sold Quantity</th>
                <th>Sale Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td>{{ $sale->product->name }}</td> <!-- Fetching product name from relation -->
                    <td>{{ $sale->sold_quantity }}</td>
                    <td>{{ $sale->sale_date }}</td>
                    <td>
                        <form action="{{ route('sales.delete', $sale->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No sales found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <a href="{{ route('sales.add') }}" class="btn btn-primary">Add Sale</a>
</div>

</body>
</html>
