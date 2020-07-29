<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
                <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Name</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($rohis as $r)
                            <tr>
                                 <td>{{$r->name}}</td>
       <td>{{ $r->class->name }}</td>
        <td>{{ $r->phone_number }}</td>
        <td>{{ $r->reason }}</td>
                            </tr>
                         @endforeach
                        </tbody>
                      </table>
        </div>
        <div class="row">
            <a href="{{ route('print')}}" class="btn btn-sm btn-danger"> Print</a>
        </div>
    </div>
</body>
</html>
