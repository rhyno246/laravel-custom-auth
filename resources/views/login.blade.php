<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif

        @if (Session::has('info'))
            <div class="alert alert-info">{{ Session::get('info') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="text-left">
                <a href="{{ route('register') }}" class="mr-3">register</a>
                <a href="{{ route('forgot') }}">forgot password</a>

                <a href="{{ route('contatcs') }}">Contacts page</a>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>