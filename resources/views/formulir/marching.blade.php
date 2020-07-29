@extends('layouts.app')

@section('title',"Ekstrakurikuler Marching Band")

@section('content')
<div class="container">
        <div class="row mt-5">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="col-md-7 mx-auto">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Marching Band</a></li>
                </ol>
            <div class="card ">
                <div class="card-body">
                    <div class="text-center">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @else
                        <h4>Formulir Pendaftaran</h4>
                        <h4>Ekstrakurikuler Marching Band</h4>
                        <div class="divider mx-auto"></div>
                    </div>
        <form action="{{ route('marching.store') }}" method="POST" class="mt-3">
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
        <button type="submit" class='btn btn-primary w-100 d-block'>Daftar</button>
        </form>
                </div>
                @endif
            </div>
            <div class="alert  mt-5">
                <strong class="font-weight-bold">Jika ada yang ingin ditanyakan,tentang ekskul marching band</strong><br>
                <strong>Hubungi : 087887774701 (Kak Naufal)</strong><br>
                <strong>Hubungi : 083823061545 (Teh Ririn)</strong>
                <hr>
            </div>
            </div>

        </div>
        </div>
</div>
@endsection
