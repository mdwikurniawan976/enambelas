@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a href="{{ route('nilai.index') }}" class="btn btn-warning me-2">Kembali</a>{{ __('Tambah Nilai') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('nilai.create') }}" method="GET">
                        <div class="form-group mt-2">
                            <label for="">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" onchange="this.form.submit()">
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" {{ request('kelas_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }} - {{ $item->jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    <form action="{{ route('nilai.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kelas_id" value="{{ request('kelas_id') }}">
                        
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="mapel_id" id="" class="form-control">
                                <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group mt-2">
                            <label for="">Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="form-control">
                                <option value="" disabled selected>Pilih Siswa</option>
                                @if(request('kelas_id'))
                                    @foreach ($siswa->where('kelas_id', request('kelas_id')) as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        
                        <div class="form-group mt-2">
                            <label for="">Nilai</label>
                            <input type="number" class="form-control" name="nilai" max="100">
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
