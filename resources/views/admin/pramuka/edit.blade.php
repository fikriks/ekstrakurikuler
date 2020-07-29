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
                    <form action="{{ route('administrator.pramuka.update',['pramuka'=>$pramuka->id]) }}" method="POST" class="mt-3">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class='form-control @error('name') is-invalid @enderror' value="{{ $pramuka->name }}">
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
                                <select name="class" class="form-control @error('class') is-invalid @enderror">
                                    @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" @if($pramuka->class_id == $k->id) selected @endif>{{ $k->name }}</option>
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
                            <label for="" class='col-md-2 col-form-label'>Asal Sekolah</label>
                            <div class="col-md-10">
                                <input type="text" name="school_origin" class='form-control @error('school_origin') is-invalid @enderror' value="{{ $pramuka->school_origin }}">
                                @error('school_origin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Tempat Lahir</label>
                            <div class="col-md-10">
                                <input type="text" name="place_of_birth" class='form-control @error('place_of_birth') is-invalid @enderror' value="{{ $pramuka->place_of_birth }}">
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
                                <input type="date" name="date_of_birth" class='form-control @error('date_of_birth') is-invalid @enderror' value="{{ $pramuka->date_of_birth }}">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Alamat</label>
                            <div class="col-md-10">
                                <input type="text" name="address" class='form-control @error('address') is-invalid @enderror' value="{{ $pramuka->address }}">
                                @error('address')
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
                                    <option value="Male" @if($pramuka->gender == "male") selected @endif>Laki-Laki</option>
                                    <option value="Female" @if($pramuka->gender == "female") selected @endif>Perempuan</option>
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
                                <input type="number" name="phone_number" class='form-control @error('phone_number') is-invalid @enderror' value="{{ $pramuka->phone_number }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Hobi</label>
                            <div class="col-md-10">
                                <input type="text" name="hobby" class='form-control @error('hobby') is-invalid @enderror' value="{{ $pramuka->hobby }}">
                                @error('hobby')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Motto Hidup</label>
                            <div class="col-md-10">
                                <textarea rows="2" name="life_motto" class='form-control @error('life_motto') is-invalid @enderror'>{{ $pramuka->life_motto }}</textarea>
                                @error('life_motto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Alasan Masuk Ekskul Ini</label>
                            <div class="col-md-10">
                                <textarea rows="5" name="reason" class='form-control @error('reason') is-invalid @enderror'>{{ $pramuka->reason }}</textarea>
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
