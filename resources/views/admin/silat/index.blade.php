@extends('layouts.admin')

@section('title','Silat')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Ekskul Silat</h1>
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
                    Silat
                    <span>({{ $total }})</span>
                  </h4>
                  <div class="card-header-action">
                    <a
                    href="{{ route('administrator.silat.create')}}"
                    class="btn btn-primary"
                  >
                    Tambah
                    <i class="fas fa-plus"></i>
                  </a>
                    <a
                      href="{{ route('administrator.silat.cetak')}}"
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
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Nomor HP</th>
                          <th>Alasan</th>
                          <th></th>
                        </tr>
                        @foreach ($silat as $s)
                        <tr>
                          <td>{{$s->name}}</td>
                         <td>{{ $s->class->name }}</td>
                         <td>{{ $s->place_of_birth }}</td>
                         <td>{{ $s->date_of_birth }}</td>
                          <td>{{ $s->phone_number }}</td>
                          <td>{{ $s->reason }}</td>
                          <td class="text-right">
                            <a href="{{ route('administrator.silat.edit',['silat'=>$s->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('administrator.silat.destroy', ['silat' => $s->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @forelse($silat as $s)
                    @empty
                    <div class="text-center p-3 text-muted">
                      <h5>Tidak ada data</h5>
                    </div>
                    @endforelse
                  </div>
                </div>
                <div class="paginate float-right mt-3">
                    {{$silat->links()}}
                </div>
            </div>
              </div>
            </div>
          </div>
    </div>
</section>
@endsection
