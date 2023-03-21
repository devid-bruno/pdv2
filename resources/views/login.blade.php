<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"id="bootstrap-css">
    <link href="css/app.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="post" action="{{ route('login.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" class="form-control" type="email" name="email"
                            value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input id="password" class="form-control" type="password" name="password" required>
                    </div>
                    @if ($errors->has('login'))
                        <br>
                        <div>
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('login') }}
                            </div>
                        </div>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-black">Login</button>

                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</html>
