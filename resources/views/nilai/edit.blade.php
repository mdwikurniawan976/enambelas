@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                    <a href="{{ route('nilai.index') }}" class="btn btn-warning me-2">Kembali</a>
                    {{ __('Edit Nilai') }}
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <!-- Form untuk memilih kelas -->
                    <form action="{{ route('nilai.create') }}" method="GET">
                        <div class="form-group mt-2">
                            <label for="">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" onchange="this.form.submit()">
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('kelas_id', $nilai->kelas_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }} - {{ $item->jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    <!-- Form untuk update nilai -->
                    <form action="{{ route('nilai.update', $nilai) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Menggunakan method PUT untuk update -->

                        <input type="hidden" name="kelas_id" value="{{ old('kelas_id', $nilai->kelas_id) }}">

                        <!-- Mata Pelajaran -->
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="mapel_id" id="" class="form-control">
                                <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('mapel_id', $nilai->mapel_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Siswa -->
                        <div class="form-group mt-2">
                            <label for="">Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="form-control">
                                <option value="" disabled selected>Pilih Siswa</option>
                                @foreach ($siswa->where('kelas_id', old('kelas_id', $nilai->kelas_id)) as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('siswa_id', $nilai->siswa_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Nilai -->
                        <div class="form-group mt-2">
                            <label for="">Nilai</label>
                            <input type="number" class="form-control" name="nilai" max="100" value="{{ old('nilai', $nilai->nilai) }}">
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
