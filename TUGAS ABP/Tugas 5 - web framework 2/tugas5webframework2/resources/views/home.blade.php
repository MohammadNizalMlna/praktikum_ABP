<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow text-center">
        <h2>Selamat datang, {{ $user->name }}</h2>
        <br>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>
</div>

</body>
</html>