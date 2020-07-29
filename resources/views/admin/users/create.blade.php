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
                    <form action="{{ route('administrator.users.store') }}" method="POST" class="mt-3">
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
                            <label for="" class='col-md-2 col-form-label'>Username</label>
                            <div class="col-md-10">
                                <input type="text" name="username" class='form-control @error('username') is-invalid @enderror' value="{{ old('username') }}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class='col-md-2 col-form-label'>Role</label>
                            <div class="col-md-10">
                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    @foreach ($role as $r)
                                    <option value="{{ $r->id }}" @if(old('role') == $r->id) selected @endif>{{ $r->name }}</option>
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
                            <label for="" class='col-md-2 col-form-label'>Password</label>
                            <div class="col-md-10">
                                <input type="password" name="password" class='form-control @error('password') is-invalid @enderror' value="{{ old('password') }}">
                                @error('password')
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
