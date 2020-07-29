<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Bengkel Seni</title>

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
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Nomor HP</th>
            <th>Kategori</th>
            <th>Motto Hidup</th>
          </tr>
          @foreach ($seni as $s)
        <tr>
            <td>{{$s->name}}</td>
            <td>{{ $s->class->name }}</td>
            <td>{{ $s->place_of_birth }}</td>
            <td>{{ $s->date_of_birth }}</td>
            <td>{{ $s->phone_number }}</td>
            <td>{{ $s->category }}</td>
            <td>{{ $s->life_motto }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @forelse($seni as $s)
  @empty
  <div class="text-center p-3 text-muted">
    <h5>Tidak ada data</h5>
  </div>
  @endforelse
</body>
</html>
