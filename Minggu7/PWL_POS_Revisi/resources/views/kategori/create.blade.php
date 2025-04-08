@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('kategori') }}" class="form-horizontal">
            @csrf

            <!-- Kode Kategori -->
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Kode Kategori</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="kode_kategori" name="kode_kategori"
                           value="{{ old('kode_kategori') }}" required>
                    @error('kode_kategori')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Nama Kategori -->
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Nama Kategori</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                           value="{{ old('nama_kategori') }}" required>
                    @error('nama_kategori')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Deskripsi Kategori -->
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Deskripsi Kategori</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                           value="{{ old('deskripsi') }}" required>
                    @error('deskripsi')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('kategori') }}">Kembali</a>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush