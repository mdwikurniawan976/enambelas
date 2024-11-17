@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a href="{{ route('kelas.index') }}" class="btn btn-warning me-2">Kembali</a>{{ __('Tambah Kelas') }}</div>

                <div class="card-body">
                    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <input type="text" class="form-control mt-1" name="nama" value="{{ $kelas->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <input type="text" class="form-control mt-1" name="jurusan" value="{{ $kelas->jurusan }}">
                        </div>
                        <button type="reset" class="btn btn-danger mt-2">Reset</button>
                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
