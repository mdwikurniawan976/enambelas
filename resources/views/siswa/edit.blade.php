@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a href="{{ route('siswa.index') }}" class="btn btn-warning me-2">Kembali</a>{{ __('Tambah Siswa') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="foto" id="" class="form-control mt-1">
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control mt-1" name="nama" value="{{ $siswa->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control mt-1" name="tanggal" value="{{ $siswa->tanggal }}">
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas_id" id="" class="form-control">
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" {{ $siswa->kelas_id == $item->id ? 'selected' : ''}}>{{ $item->nama }} - {{ $item->jurusan }}</option>
                                @endforeach
                            </select>
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
