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
        <form action="{{ route('reset.token') }}" method="post" >
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control" value="{{ $email }}">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
              </div>
            <div class="form-group">
              <label>Cf Password</label>
              <input type="password" class="form-control" name="cf-password">
            </div>
            <button type="submit" class="btn btn-primary">Reset password</button>
        </form>
    </div>
</body>
</html>