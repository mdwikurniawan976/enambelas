@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Mapel') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('home') }}" class="btn btn-warning ">Kembali</a>
                        <a href="{{ route('mapel.create') }}" class="btn btn-success ">Tambah Data</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mapel as $k => $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <form action="{{ route('mapel.destroy', $item) }}" onsubmit="return confirm('apakah anda yakin menghapus data Pelajaran {{ $item->nama }}');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('mapel.edit', $item) }}" class="btn btn-primary">Edit</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada Mata Pelajaran.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $mapel->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
