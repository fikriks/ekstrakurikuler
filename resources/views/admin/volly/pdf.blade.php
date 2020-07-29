<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Volly</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 5pt;
		}
    </style>
</head>
<body>
<table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th>Poto</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Nomor HP</th>
            <th>Alamat</th>
            <th>Nama Orang Tua</th>
            <th>Jenis Kelamin</th>
            <th>Hobi</th>
            <th>Riwayat Penyakit</th>
            <th>Prestasi</th>
          </tr>
          @foreach ($volly as $v)
    <tr>
        <td><img src="{{ storage_path('app/public/img/volly/'.$v->photo) }}" height="50"/></td>
        <td>{{$v->name}}</td>
        <td>{{ $v->class->name }}</td>
        <td>{{ $v->place_of_birth }}</td>
        <td>{{ $v->date_of_birth }}</td>
        <td>{{ $v->phone_number }}</td>
        <td>{{ $v->address }}</td>
        <td>{{ $v->parents_name }}</td>
        @if($v->gender == 'male')
        <td>Laki-Laki</td>
        @else
        <td>Perempuan</td>
        @endif
        <td>{{ $v->hobby }}</td>
        @if(!$v->history_of_disiase)
        <td>Tidak Ada</td>
        @else
        <td>{{ $v->history_of_disiase }}</td>
        @endif
        @if(!$v->achievement)
        <td>Tidak Ada</td>
        @else
        <td>{{ $v->achievement }}</td>
        @endif
        </tr>
        @endforeach
    </tbody>
  </table>
  @forelse($volly as $v)
  @empty
  <div class="text-center p-3 text-muted">
    <h5>Tidak ada data</h5>
  </div>
  @endforelse
</body>
</html>
