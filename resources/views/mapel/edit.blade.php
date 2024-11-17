@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a href="{{ route('mapel.index') }}" class="btn btn-warning me-2">Kembali</a>{{ __('Edit Kelas') }}</div>

                <div class="card-body">
                    <form action="{{ route('mapel.update', $mapel) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <input type="text" class="form-control mt-1" name="nama" value="{{ $mapel->nama }}">
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
