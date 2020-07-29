<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Rohis</title>

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
        <th>Alasan</th>
      </tr>
      @foreach ($rohis as $r)
      <tr>
        <td>{{$r->name}}</td>
        <td>{{ $r->class->name }}</td>
        <td>{{ $r->phone_number }}</td>
        <td>{{ $r->reason }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @forelse($rohis as $r)
  @empty
  <div class="text-center p-3 text-muted">
      <h5>Tidak ada data</h5>
  </div>
  @endforelse
</body>
</html>
