@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Kelas') }}</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('home') }}" class="btn btn-warning ">Kembali</a>
                        <a href="{{ route('kelas.create') }}" class="btn btn-success ">Tambah Data</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelas as  $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jurusan }}</td>
                                    <td>
                                        <form action="" onsubmit="return confirm('apakah anda yakin menghapus data kelas {{ $item->nama }}');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('kelas.show', $item) }}" class="btn btn-secondary">Detail</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Tidak ada Kelas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $kelas->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
