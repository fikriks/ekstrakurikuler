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
                    <form action="{{ route('administrator.pmr.update',['pmr'=>$pmr->id]) }}" method="POST" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class='form-control @error('name') is-invalid @enderror' value="{{ $pmr->name }}">
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
                                     <option value="{{ $k->id }}" @if($pmr->class_id == $k->id) selected @endif>{{ $k->name }}</option>
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
                            <label for="" class='col-md-2 col-form-label'>Tempat Lahir</label>
                            <div class="col-md-10">
                                <input type="text" name="place_of_birth" class='form-control @error('place_of_birth') is-invalid @enderror' value="{{ $pmr->place_of_birth }}">
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
                                <input type="date" name="date_of_birth" class='form-control @error('date_of_birth') is-invalid @enderror' value="{{ $pmr->date_of_birth }}">
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
                                <input type="number" name="phone_number" class='form-control @error('phone_number') is-invalid @enderror' value="{{ $pmr->phone_number }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Agama</label>
                            <div class="col-md-10">
                               <select name="religion" class="form-control @error('religion') is-invalid @enderror">
                                   <option value="Islam" @if($pmr->religion == "islam") selected @endif>Islam</option>
                                   <option value="Kristen" @if($pmr->religion == "kristen") selected @endif>Kristen</option>
                                   <option value="Katolik" @if($pmr->religion == "katolik") selected @endif>Katolik</option>
                                   <option value="Hindu" @if($pmr->religion == "hindu") selected @endif>Hindu</option>
                                   <option value="Buddha" @if($pmr->religion == "buddha") selected @endif>Buddha</option>
                                   <option value="Konghucu" @if($pmr->religion == "konghucu") selected @endif>Konghucu</option>
                               </select>
                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Hobi</label>
                            <div class="col-md-10">
                                <input type="text" name="hobby" class='form-control @error('hobby') is-invalid @enderror' value="{{ $pmr->hobby }}">
                                @error('hobby')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Alasan Ingin Mengikuti Ekskul Ini</label>
                            <div class="col-md-10">
                                <textarea rows="4" name="reason" class='form-control @error('reason') is-invalid @enderror'>{{ $pmr->reason }}</textarea>
                                @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Motto Hidup</label>
                            <div class="col-md-10">
                                <textarea rows="3" name="life_motto" class='form-control @error('life_motto') is-invalid @enderror'>{{ $pmr->life_motto }}</textarea>
                                @error('life_motto')
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
                                    <option value="Male" @if($pmr->gender == "Male") selected @endif>Laki-Laki</option>
                                    <option value="Female" @if($pmr->gender == "Female") selected @endif>Perempuan</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Photo</label>
                            <div class="col-md-10">
                                <img src="{{ Storage::url('img/pmr/'.$pmr->photo) }}" alt="Foto Siswa" class="img-fluid">
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
