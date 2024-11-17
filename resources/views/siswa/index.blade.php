@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Siswa') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('home') }}" class="btn btn-warning ">Kembali</a>
                        <a href="{{ route('siswa.create') }}" class="btn btn-success ">Tambah Data</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as  $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/foto/'. $item->foto) }}"  class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->kelas->nama }} - {{ $item->kelas->jurusan }}</td>
                                    <td>
                                        <form action="{{ route('siswa.destroy', $item) }}" onsubmit="return confirm('apakah anda yakin menghapus data siswa {{ $item->nama }}');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('siswa.edit', $item) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('siswa.show',$item) }}" class="btn btn-secondary">Detail</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada siswa di kelas ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $siswa->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
