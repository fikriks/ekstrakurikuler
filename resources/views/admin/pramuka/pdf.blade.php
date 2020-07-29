<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Data Pramuka</title>
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
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Hobi</th>
            <th>Motto Hidup</th>
            <th>Alasan</th>
          </tr>
          @foreach ($pramuka as $p)
          <tr>
            <td>{{$p->name}}</td>
           <td>{{ $p->class->name }}</td>
           <td>{{ $p->school_origin }}</td>
           <td>{{ $p->place_of_birth }}</td>
           <td>{{ $p->date_of_birth }}</td>
            <td>{{ $p->phone_number }}</td>
            <td>{{ $p->address }}</td>
            @if($p->gender == 'male')
            <td>Laki-Laki</td>
            @else
            <td>Perempuan</td>
            @endif
            <td>{{ $p->hobby }}</td>
            <td>{{ $p->life_motto }}</td>
            <td>{{ $p->reason }}</td>
          </tr>
          @endforeach
    </tbody>
  </table>
    @forelse($pramuka as $p)
    @empty
    <div class="text-center p-3 text-muted">
        <h5>Tidak ada data</h5>
    </div>
    @endforelse
</body>
</html>
