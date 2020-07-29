@extends('layouts.admin')

@section('title','Volly')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Ekskul Volly</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                <div class="alert alert-primary">{{ session('success') }}</div>
                 @endif
              <div class="card">
                <div class="card-header">
                  <h4 class="text-primary">
                    Volly
                    <span>({{ $total }})</span>
                  </h4>
                  <div class="card-header-action">
                    <a
                    href="{{ route('administrator.volly.create')}}"
                    class="btn btn-primary"
                  >
                    Tambah
                    <i class="fas fa-plus"></i>
                  </a>
                    <a
                      href="{{ route('administrator.volly.cetak')}}"
                      class="btn btn-danger"
                      target="_blank"
                    >
                      Cetak PDF
                      <i class="fas fa-newspaper"></i>
                    </a>
                  </div>
                </div>

                <div class="card-body p-0">
                    <div class="row mb-3 ml-auto">
                        <div class="col-md-4">
                            <form action="" class="form-inline">
                                <input type="text" class="form-control mr-2" placeholder="Cari Nama" name='search'>
                                <button type="submit" class='btn btn-primary'>Cari</button>
                            </form>
                        </div>
                    </div>
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
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
                          <th></th>
                        </tr>
                        @foreach ($volly as $v)
                        <tr>
                        <td><img class="img-fluid" src="{{ Storage::url('img/volly/'.$v->photo) }}"></td>
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
                          <td class="text-right">
                            <a href="{{ route('administrator.volly.edit',['volly'=>$v->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('administrator.volly.destroy', ['volly' => $v->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
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
                  </div>
                </div>
                <div class="paginate float-right mt-3">
                    {{$volly->links()}}
                </div>
            </div>
              </div>
            </div>
          </div>
    </div>
</section>
@endsection
