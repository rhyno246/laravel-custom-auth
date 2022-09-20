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
        <form method="POST" action="{{ route('forgot') }}">
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            @csrf
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Send reset passowrd</button>
        </form>
    </div>
</body>
</html>