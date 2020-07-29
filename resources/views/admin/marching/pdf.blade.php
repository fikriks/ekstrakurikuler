<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Marching Band</title>

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
            <th>Nomor HP</th>
            <th>Alat Yang Dipilih</th>
          </tr>
          @foreach ($marching as $m)
          <tr>
            <td>{{$m->name}}</td>
           <td>{{ $m->class->name }}</td>
           <td>{{ $m->school_origin }}</td>
            <td>{{ $m->phone_number }}</td>
            <td>{{ ucfirst($m->tool) }}</td>
          </tr>
          @endforeach
    </tbody>
  </table>
  @forelse($marching as $m)
    @empty
    <div class="text-center p-3 text-muted">
        <h5>Tidak ada data</h5>
    </div>
    @endforelse
</body>
</html>
