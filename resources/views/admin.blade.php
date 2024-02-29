<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Admin</title>
    </head>
    <body class="bg-secondary">
        <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
            <h1>Hallo!!</h1>
            <div><a href="/logout" class="btn btn-sm btn-secondary">Logout >></a></div>
            <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    @if (Auth::user()->role == 'administrator')
                        <li class="list-group-item">Menu administrator</li>
                    @endif
                    @if (Auth::user()->role == 'petugas')
                        <li class="list-group-item">Menu petugas</li>
                    @endif
                    @if (Auth::user()->role == 'peminjam')
                        <li class="list-group-item">Menu peminjam</li>
                    @endif
                </ul>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>