@extends('layouts.admin')

@section('title','Marching Band')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Ekskul Marching Band</h1>
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
                    Marching Band
                    <span>({{ $total }})</span>
                  </h4>
                  <div class="card-header-action">
                    <a
                    href="{{ route('administrator.marching.create')}}"
                    class="btn btn-primary"
                  >
                    Tambah
                    <i class="fas fa-plus"></i>
                  </a>
                    <a
                      href="{{ route('administrator.marching.cetak')}}"
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
                          <th>Asal Sekolah</th>
                          <th>Nomor HP</th>
                          <th>Alat Yang Dipilih</th>
                          <th>Alasan</th>
                          <th></th>
                        </tr>
                        @foreach ($marching as $m)
                        <tr>
                          <td>{{$m->name}}</td>
                         <td>{{ $m->class->name }}</td>
                         <td>{{ $m->school_origin }}</td>
                          <td>{{ $m->phone_number }}</td>
                          <td>{{ ucfirst($m->tool) }}</td>
                          <td>{{ $m->reason }}</td>
                          <td class="text-right">
                            <a href="{{ route('administrator.marching.edit',['marching'=>$m->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('administrator.marching.destroy', ['marching' => $m->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
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
                  </div>
                </div>
                <div class="paginate float-right mt-3">
                    {{$marching->links()}}
                </div>
            </div>
              </div>
            </div>
          </div>
    </div>
</section>
@endsection
