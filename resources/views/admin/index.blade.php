<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
<h1 class="mb-4">Admin Dashboard</h1>
<p>Only admins can see this page.</p>
<form method="POST" action="{{ url('/logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
</body>
</html>
