@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Nilai') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('home') }}" class="btn btn-warning ">Kembali</a>
                        <a href="{{ route('nilai.create') }}" class="btn btn-success ">Tambah Data</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Siswa</th>
                                <th>Kelas</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($nilai as  $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->mapel->nama }}</td>
                                    <td>{{ $item->siswa->nama }}</td>
                                    <td>{{ $item->kelas->nama }} - {{ $item->kelas->jurusan }}</td>
                                    <td>{{ $item->nilai }}</td>
                                    <td>
                                        <form action="{{ route('nilai.destroy', $item) }}" onsubmit="return confirm('apakah anda yakin menghapus data nilai {{ $item->mapel->nama }}');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('nilai.edit', $item) }}" class="btn btn-primary">Edit</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada nilai.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $nilai->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
