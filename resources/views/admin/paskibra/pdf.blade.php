<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Paskibra</title>

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
            <th>Asal Sekolah</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Nomor HP</th>
            <th>Hobi</th>
            <th>Cita-Cita</th>
            <th>Motivasi</th>
            <th>Ijin Orang Tua</th>
          </tr>
          @foreach ($paskibra as $p)
          <tr>
            <td>{{$p->name}}</td>
           <td>{{ $p->class->name }}</td>
           <td>{{ $p->school_origin }}</td>
           <td>{{ $p->place_of_birth }}</td>
           <td>{{ $p->date_of_birth }}</td>
            <td>{{ $p->phone_number }}</td>
            <td>{{ $p->hobby }}</td>
            <td>{{ $p->future_goals }}</td>
            <td>{{ $p->motivation }}</td>
            <td>{{ $p->permission_of_parents }}</td>
          </tr>
          @endforeach
    </tbody>
  </table>
  @forelse($paskibra as $p)
  @empty
  <div class="text-center p-3 text-muted">
    <h5>Tidak ada data</h5>
  </div>
  @endforelse
</body>
</html>
