@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Detail Siswa') }}</div>
                <div class="card-body">
                    <img src="{{ asset('storage/foto/'. $siswa->foto) }}" style="width: 50%"  class=" rounded" alt="">
                    <hr>
                    <h3 class="font-weight-bold">Nama  : {{ $siswa->nama }}</h3>
                    <h5 class="font-weight-bold">Tanggal Lahir : {{ $siswa->tanggal }}</h5>
                    <h5 class="font-weight-bold">Kelas : {{ $siswa->kelas->nama }} - {{ $siswa->kelas->jurusan }}</h5>
                    <a href="{{ route('siswa.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
