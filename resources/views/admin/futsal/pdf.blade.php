<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Futsal</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 8pt;
		}
    </style>
</head>
<body>
<table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Nomor HP</th>
            <th>Jenis Kelamin</th>
          </tr>
          @foreach ($futsal as $f)
          <tr>
            <td>{{$f->name}}</td>
           <td>{{ $f->class->name }}</td>
            <td>{{ $f->phone_number }}</td>
            @if($f->gender == 'male')
            <td>Laki-Laki</td>
            @else
            <td>Perempuan</td>
            @endif
          </tr>
          @endforeach
    </tbody>
  </table>
  @forelse($futsal as $f)
  @empty
  <div class="text-center p-3 text-muted">
    <h5>Tidak ada data</h5>
  </div>
  @endforelse
</body>
</html>
