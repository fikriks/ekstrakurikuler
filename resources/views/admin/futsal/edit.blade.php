@extends('layouts.admin')

@section('title','Edit Data')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Data</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Edit Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrator.futsal.update',['futsal'=>$futsal->id]) }}" method="POST" class="mt-3">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class='form-control @error('name') is-invalid @enderror' value="{{ $futsal->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Kelas</label>
                            <div class="col-md-10">
                                <select name="class" class="form-control @error('class') is-invalid @enderror" value="{{ $futsal->class_id }}">
                                    @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" @if($futsal->class_id == $k->id) selected @endif>{{ $k->name }}</option>
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
                                    <option value="Male" @if($futsal->gender == 'male') selected @endif>Laki-Laki</option>
                                    <option value="Female" @if($futsal->gender == 'female') selected @endif>Perempuan</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Nomor HP</label>
                            <div class="col-md-10">
                                <input type="number" name="phone_number" class='form-control @error('phone_number') is-invalid @enderror' value="{{ $futsal->phone_number }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'></label>
                            <div class="col-md-10">
                        <button type="submit" class='btn btn-primary'>Edit</button>
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
