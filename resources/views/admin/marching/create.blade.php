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
                    <form action="{{ route('administrator.marching.store') }}" method="POST" class="mt-3">
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
                            <label for="" class='col-md-2 col-form-label'>Asal Sekolah</label>
                            <div class="col-md-10">
                                <input type="text" name="school_origin" class='form-control @error('school_origin') is-invalid @enderror' value="{{ old('school_origin') }}">
                                @error('school_origin')
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
                            <label for="" class='col-md-2 col-form-label'>Alat Yang Dipilih</label>
                            <div class="col-md-10">
                                <select name="tool" class='form-control @error('tool') is-invalid @enderror'>
                                    <option value="Senar" @if(old('tool') == "Senar") selected @endif>Senar</option>
                                    <option value="Bass" @if(old('tool') == "Bass") selected @endif>Bass</option>
                                    <option value="Tenor" @if(old('tool') == "Tenor") selected @endif>Tenor</option>
                                    <option value="Triotom" @if(old('tool') == "Triotom") selected @endif>Triotom</option>
                                    <option value="Kuartom" @if(old('tool') == "Kuartom") selected @endif>Kuartom</option>
                                    <option value="Symbal" @if(old('tool') == "Symbal") selected @endif>Symbal</option>
                                    <option value="Mayoret" @if(old('tool') == "Mayoret") selected @endif>Mayoret</option>
                                    <option value="Colorguard" @if(old('tool') == "Colorguard") selected @endif>Colorguard</option>
                                    <option value="Bell" @if(old('tool') == "Bell") selected @endif>Bell</option>
                                </select>
                                @error('tool')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Alasan Ingin Mengikuti Ekskul Ini</label>
                            <div class="col-md-10">
                                <textarea rows="4" name="reason" class='form-control @error('reason') is-invalid @enderror'>{{ old('reason') }}</textarea>
                                @error('reason')
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
