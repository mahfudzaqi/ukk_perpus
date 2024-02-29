<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        a {
            text-decoration: none;
        }
    </style>
    <title>Login</title>
</head>
<body class="bg-secondary">
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-5 mx-auto bg-light">
            <h1>Login</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $item)
                          <li>{{ $item }}</li>
                    @endforeach
                </div>
            @endif
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <p>Belum punya akun? <a href="{{ url('Register') }}">Register</a></p>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>