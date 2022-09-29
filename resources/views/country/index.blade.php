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
        <form>
            @csrf
            <div class="form-group">
              <label>Country</label>
              <select name="country" class="form-control">
                
                @foreach ($countries as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label>State</label>
                <select name="state" class="form-control">
                  <option value="">dsasaddsa</option>
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Send reset passowrd</button>
        </form>
    </div>
</body>
</html>