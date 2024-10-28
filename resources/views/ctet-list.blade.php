<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4a4a4a;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <h1>Subjects List</h1>

    <table>
    <tr>
        <th>ID</th>
        <th>Subject Name</th>
        <th>Topic</th>
        <th>Status</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    @foreach($ctets as $ctet)
    <tr>
        <td>{{ $ctet->id }}</td>
        <td>{{ $ctet->subject_name }}</td>
        <td>{{ $ctet->topic }}</td>
        <td>{{ $ctet->status }}</td>
        <td>{{ $ctet->date }}</td>
        <td>
            <!-- Delete Form -->
            <form action="{{ route('ctets.destroy', $ctet->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: blue; color: white; border-radius: 4px;" onclick="return confirm('Are you sure you want to delete this subject?');">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

    <a href="{{url('ctet-add')}}">Add New Subject</a>
</body>
</html>
