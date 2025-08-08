<!DOCTYPE html>
<html>
<head>
    <title>Login - Perpustakaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #ffe259, #ffa751);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-login {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        h3 {
            font-weight: 700;
            color: #333;
        }

        .form-control {
            border-radius: 12px;
            padding-left: 40px;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .form-group {
            position: relative;
        }

        .btn-primary {
            background-color: #FFC324;
            border: none;
            color: #000;
            font-weight: bold;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e6b800;
            color: #000;
        }

        .alert {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="card-login">
    <h3 class="text-center mb-4">📚 Login Admin</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div class="mb-3 form-group">
            <i class="fas fa-envelope input-icon"></i>
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        </div>

        <div class="mb-3 form-group">
            <i class="fas fa-lock input-icon"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button class="btn btn-primary w-100 mt-2" type="submit">Login</button>
    </form>
</div>

</body>
</html>
 