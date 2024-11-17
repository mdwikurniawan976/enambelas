@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Detail Kelas') }}</div>

                <div class="card-body">
                    <a href="{{ route('kelas.index') }}" class="btn btn-warning mb-3">Kembali</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelas->siswa as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada siswa di kelas ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <strong>Jumlah Siswa :</strong>  {{ $kelas->siswa->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
