@extends('layouts.admin')

@section('title','Tambah Data')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Data</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Data Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrator.volly.store') }}" method="POST" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class='form-control @error('name') is-invalid @enderror' value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Nama Orang Tua</label>
                            <div class="col-md-10">
                                <input type="text" name="parents_name" class='form-control @error('parents_name') is-invalid @enderror' value="{{ old('parents_name') }}">
                                @error('parents_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Kelas</label>
                            <div class="col-md-10">
                                <select name="class" class="form-control @error('class') is-invalid @enderror">
                                    @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" @if(old('class')== $k->id) selected @endif>{{ $k->name }}</option>
                                    @endforeach
                                </select>
                                @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Jenis Kelamin</label>
                            <div class="col-md-10">
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="Male" @if(old('gender')== "Male") selected @endif>Laki-Laki</option>
                                    <option value="Female" @if(old('gender')== "Female") selected @endif>Perempuan</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Alamat</label>
                            <div class="col-md-10">
                                <input type="text" name="address" class='form-control @error('address') is-invalid @enderror' value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Tempat Lahir</label>
                            <div class="col-md-10">
                                <input type="text" name="place_of_birth" class='form-control @error('place_of_birth') is-invalid @enderror' value="{{ old('place_of_birth') }}">
                                @error('place_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input type="date" name="date_of_birth" class='form-control @error('date_of_birth') is-invalid @enderror' value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Nomor HP</label>
                            <div class="col-md-10">
                                <input type="number" name="phone_number" class='form-control @error('phone_number') is-invalid @enderror' value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Riwayat Penyakit (Kosongkan Bila Tidak Ada)</label>
                            <div class="col-md-10">
                                <input type="text" name="disiase" class='form-control @error('disiase') is-invalid @enderror' value="{{ old('disiase') }}">
                                @error('disiase')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Hobi</label>
                            <div class="col-md-10">
                                <input type="text" name="hobby" class='form-control @error('hobby') is-invalid @enderror' value="{{ old('hobby') }}">
                                @error('hobby')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Prestasi Yang Pernah Di Raih (Kosongkan Bila Tidak Ada)</label>
                            <div class="col-md-10">
                                <input type="text" name="achievement" class='form-control @error('achievement') is-invalid @enderror' value="{{ old('achievement') }}">
                                @error('achievement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Photo</label>
                            <div class="col-md-10">
                               <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                               @error('photo')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'></label>
                            <div class="col-md-10">
                        <button type="submit" class='btn btn-primary'>Tambah</button>
                     </div>
                        </div>
                        </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</section>
@endsection
