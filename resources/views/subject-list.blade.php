<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Education Options</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.navbar {
    background-color: #4CAF50;
    color: white;
    display: flex;
    justify-content: space-between;
    padding: 15px;
}

.navbar-logo {
    font-size: 24px;
    font-weight: bold;
}

.navbar-menu {
    list-style: none;
    display: flex;
    gap: 15px;
}

.navbar-menu li {
    display: inline;
}

.navbar-menu a {
    color: white;
    text-decoration: none;
}

.container {
    text-align: center;
    padding: 50px;
}

h1 {
    color: #333;
}

.options {
    display: flex;
    justify-content: center;
    gap: 50px;
}

.option {
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    width: 200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.option h2 {
    color: #4CAF50;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-logo">My Education Portal</div>
        <ul class="navbar-menu">
            <li><a href="#">Home</a></li>
            <li><a href="{{route('logout')}}">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Select Your Course</h1>
        <div class="options">
            <div class="option" id="ctet">
                <h2>CTET</h2>
                <p>Central Teacher Eligibility Test (CTET) is conducted for aspiring teachers.</p>
                <a href="{{url('ctet-list')}}">Select Ctet</a>
            </div>
            <div class="option" id="bed">
                <h2>B.Ed</h2>
                <p>Bachelor of Education (B.Ed) is a graduate program for teaching professionals.</p>
                <a href="{{url('bed-list')}}">Select B.Ed</a>
            </div>
        </div>
    </div>

    <!-- <script>
        function selectOption(course) {
            alert(`You selected ${course}`);
            // Here, you can add additional functionality such as redirecting to another page or loading more information.
        }
    </script> -->
</body>
</html>
