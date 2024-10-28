<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }

        .success, .error {
            padding: 10px;
            margin: 15px 0;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 14px;
            }
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #007bff;
        }

        .action-buttons form {
            display: inline; /* Prevent form from being block */
        }
    </style>
</head>
<body>

<h1>Product List</h1>

@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="error">
        {{ session('error') }}
    </div>
@endif

<a href="{{ url('product-add') }}" style="float: right; font-size: 14px;">ADD Product</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Batch Card ID</th>
            <th>Manufacture Date</th>
            <th>Expiry Date</th>
            <th>Actions</th> <!-- Added Actions header -->
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    @if ($product->quantity === 0)
                        <!-- Hide the quantity if it's zero -->
                        <span style="display: none;">0</span>
                    @elseif ($product->quantity < 5)
                        <!-- Red for quantities less than 5 -->
                        <span style="background-color: red; color: white; padding: 5px; border-radius: 5px;">{{ $product->quantity }}</span>
                    @elseif ($product->quantity < 10)
                        <!-- Yellow for quantities less than 10 -->
                        <span style="background-color: yellow; color: black; padding: 5px; border-radius: 5px;">{{ $product->quantity }}</span>
                    @else
                        <!-- Default display for quantities 10 or more -->
                        <span>{{ $product->quantity }}</span>
                    @endif
                </td>
                <td>{{ $product->batchcard_id }}</td>
                <td>{{ $product->manufacture_date }}</td>
                <td>{{ $product->expiry_date }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 5px;">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No products found.</td> <!-- Adjusted colspan to 7 -->
            </tr>
        @endforelse
    </tbody>
</table>


<!-- Add any required scripts here -->

</body>
</html>
