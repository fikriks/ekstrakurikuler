@extends('layouts.app')

@section('title',"Ekstrakurikuler Pencak Silat")

@section('content')
<div class="container">
        <div class="row mt-5">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="col-md-7 mx-auto">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Pencak Silat</a></li>
                </ol>
                <div class="alert mt-5">
                    <h5 class="font-weight-bold">Motto Tapak Suci SMK Negeri 4 Kuningan</h5>
                    <blockquote>"Dengan iman dan akhlak saya menjadi kuat,Tanpa iman dan akhlak saya menjadi lemah"</blockquote>
                    <hr>
                </div>
            <div class="card ">
                <div class="card-body">
                    <div class="text-center">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @else
                        <h4>Formulir Pendaftaran</h4>
                        <h4>Ekstrakurikuler Pencak Silat</h4>
                        <div class="divider mx-auto"></div>
                    </div>
        <form action="{{ route('silat.store') }}" method="POST" class="mt-3">
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
        <button type="submit" class='btn btn-primary w-100 d-block'>Daftar</button>
        </form>
                </div>
                @endif
            </div>
            <div class="alert  mt-5">
                <strong class="font-weight-bold">Jika ada yang ingin ditanyakan,tentang ekskul pencak silat</strong><br>
                <strong>Hubungi : 083824965760 (Kak Nurwahid)</strong>
                <hr>
            </div>
            </div>

        </div>
        </div>
</div>
@endsection
