<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #dbdbdb;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #0095f6;
            outline: none;
        }

        button {
            width: 100%;
            background-color: #0095f6;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #007bbf;
        }
    </style>
</head>
<body>
<form method="POST" action="{{ route('signup') }}">
    @csrf
    <h1>Sign Up</h1>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required autofocus />
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required />
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required />
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required />
    </div>

    <button type="submit">Register</button>
</form>
</body>
</html>
