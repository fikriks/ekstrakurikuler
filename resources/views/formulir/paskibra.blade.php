@extends('layouts.app')

@section('title',"Ekstrakurikuler Paskibra")

@section('content')
<div class="container">
        <div class="row mt-5">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="col-md-7 mx-auto">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Paskibra</a></li>
                </ol>
            <div class="card ">
                <div class="card-body">
                    <div class="text-center">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @else
                        <h4>Formulir Pendaftaran</h4>
                        <h4>Ekstrakurikuler Paskibra</h4>
                        <div class="divider mx-auto"></div>
                    </div>
        <form action="{{ route('paskibra.store') }}" method="POST" class="mt-3">
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
            <label for="" class='col-md-2 col-form-label'>Cita Cita</label>
            <div class="col-md-10">
                <input type="text" name="future_goals" class='form-control @error('future_goals') is-invalid @enderror' value="{{ old('future_goals') }}">
                @error('future_goals')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class='col-md-2 col-form-label'>Motivasi Memasuki Ekskul Ini</label>
            <div class="col-md-10">
                <textarea rows="4" type="text" name="motivation" class='form-control @error('motivation') is-invalid @enderror'>{{ old('motivation') }}</textarea>
                @error('motivation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class='col-md-2 col-form-label'>Apakah Orang Tua Mengijinkan?</label>

            <div class="col-md-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="permission" id="permission1" value="Ya" @if(old('permission') == 'Ya') checked @endif required>
                    <label class="form-check-label" for="permission1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="permission" id="permission2" value="Tidak" @if(old('permission') == 'Tidak') checked @endif required>
                    <label class="form-check-label" for="permission2">Tidak</label>
                </div>
            </div>
        </div>
        <button type="submit" class='btn btn-primary w-100 d-block'>Daftar</button>
        </form>
                </div>
                @endif
            </div>
            <div class="alert  mt-5">
                <strong class="font-weight-bold">Jika ada yang ingin ditanyakan,tentang ekskul paskibra</strong><br>
                <strong>Hubungi : 088222007322 (Kak Adit)</strong>
                <hr>
            </div>
            </div>

        </div>
        </div>
</div>
@endsection
