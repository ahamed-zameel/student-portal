<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Edit Product</h1>

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

<form action="{{ route('product.update', $product->id) }}" method="POST">
    @csrf
    @method('POST')

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $product->name }}" required>
    
    <label for="description">Description:</label>
    <textarea name="description">{{ $product->description }}</textarea>
    
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" value="{{ $product->quantity }}" required>
    
    <label for="batchcard_id">Batch Card ID:</label>
    <input type="number" name="batchcard_id" value="{{ $product->batchcard_id }}" required>
    
    <label for="manufacture_date">Manufacture Date:</label>
    <input type="date" name="manufacture_date" value="{{ $product->manufacture_date }}" required>
    
    <label for="expiry_date">Expiry Date:</label>
    <input type="date" name="expiry_date" value="{{ $product->expiry_date }}" required>

    <button type="submit">Update Product</button>
</form>

<a href="{{ url('product-list') }}">Back to Product List</a>

</body>
</html>
