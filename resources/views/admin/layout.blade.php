<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { display: flex; }
    .sidebar {
      width: 250px; height: 100vh;
      background: #343a40; color: white;
      padding: 20px;
    }
    .sidebar a { color: white; display: block; margin: 10px 0; text-decoration: none; }
    .content { flex: 1; padding: 20px; }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <form action="{{ route('admin.logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger mt-3">Logout</button>
    </form>
  </div>
  <div class="content">
    @yield('content')
  </div>
</body>
</html>
