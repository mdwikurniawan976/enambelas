@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <br>
                    <a href="{{ route('kelas.index') }}" class="btn btn-primary mt-2 w-100">Kelas</a>
                    <a href="{{ route('siswa.index') }}" class="btn btn-success mt-2 w-100">Siswa</a>
                    <a href="{{ route('mapel.index') }}" class="btn btn-warning mt-2 w-100">Mapel</a>
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary mt-2 w-100">Nilai</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
