<!-- resources/views/product/add.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Adjust the path as needed -->
    <style>
        /* General styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    font-size: 28px;
    margin-bottom: 20px;
    color: #007bff;
}

form .form-group {
    margin-bottom: 15px;
}

form .form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

form .form-group input,
form .form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 16px;
}

form .form-group input:focus,
form .form-group textarea:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

form .form-group textarea {
    resize: vertical;
}

form .btn {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form .btn:hover {
    background-color: #0056b3;
}

/* Success message styling */
.alert-success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 20px;
    border: 1px solid #c3e6cb;
}

/* Responsive styles */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    h1 {
        font-size: 24px;
    }

    form .btn {
        font-size: 16px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Add Product</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       <form action="{{ route('product.add') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Product Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="quantity">Current Stock Quantity</label>
        <input type="number" name="quantity" class="form-control" min="0" required>
    </div>

    <div class="form-group">
        <label for="batchcard_id">Batch Card ID</label>
        <input type="number" name="batchcard_id" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="manufacture_date">Manufacture Date</label>
        <input type="date" name="manufacture_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="expiry_date">Expiry Date</label>
        <input type="date" name="expiry_date" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
</form>



    </div>

    <script src="{{ asset('js/app.js') }}"></script> <!-- Adjust the path as needed -->
</body>
</html>
