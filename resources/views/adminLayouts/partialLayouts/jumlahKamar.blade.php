@extends('adminLayouts.dashboardAdmin')

@section('container')
@if (session()->has('showError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('showError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h1>Data Jumlah Kamar</h1>
<div class="table-jumlah-container">
    <table class="table">
        <thead class="table-head">
            <tr>
                <th width="10%" class="text-center">Nomor Kamar</th>
                <th class="text-center">Jenis Kamar</th>
                <th>Penghuni</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room )
            <tr>
                <td width="10%" class="text-center">{{ $room->nomor_kamar }}</td>
                <td class="text-center">{{ $room->category->name }}</td>
                @if ($room->statusTenant === "Tidak")
                    <td style="color: red; font-weight:700;">Kosong</td>
                @elseif ($room->statusTenant === "Ada" && $room->statusPayment === "Menunggu")
                    <td style="color: blue; font-weight:700;">Menunggu</td>
                @elseif ($room->statusTenant === "Ada" && $room->statusPayment === "Aktif")
                    <td style="color: green; font-weight:700;">{{ $room->tenant_name }}</td>
                @endif
                <td>
                    <a href="/jmlhKamar/edit-kamar-{{ $room->id }}"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="/jmlhKamar/delete-kamar-{{ $room->id }}" onclick="return confirm('Apakah kamu yakin?')"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="table-foot">
            <tr>
                <td colspan="3">
                    <a href="/jmlhKamar/tambah-kamar"><i class="fa-solid fa-circle-plus"></i> Tambah Data</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection