@extends('adminLayouts.dashboardAdmin')

@section('container')
@if (session()->has('successStore'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successStore') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('successUpdate'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successUpdate') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('successDestroy'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successDestroy') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('destroyError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('destroyError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h1>Data Jenis Kamar</h1>
<div class="table-jenis-container">
    <table class="table">
        <thead class="table-head">
            <tr>
                <th>Nomor</th>
                <th>Gambar</th>
                <th>Jenis Kamar</th>
                <th>Fasilitas</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                @if($category->image)
                    <a href="storage/{{ $category->image }}">Check Gambar</a>
                @else
                    Gambar Tidak Tersedia
                @endif                    
                </td>
                <td>{{ $category->name }}</td>
                <td>
                    {{ $category->fasilitas }}
                </td>
                <td>IDR. {{ $category->priceDay }} / Day<br>
                    IDR. {{ $category->priceWeek }} /Week<br>
                    IDR. {{ $category->priceMonth }} /Month<br>
                </td>
                <td>
                    <a href="/jnsKamar/edit-kategori-{{ $category->id }}" class="d-inline"><i class="fa-solid fa-file-pen"></i></a>
                    <form action="/jnsKamar/delete-kategori-{{ $category->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-transparent border-0" onclick="return confirm('Apakah kamu yakin menghapus kategori?')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
        <tfoot class="table-foot">
            <tr>
                <td colspan="3">
                    <a href="/jnsKamar/tambah-kategori"><i class="fa-solid fa-circle-plus"></i> Tambah Data</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection