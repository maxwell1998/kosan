
@extends('adminLayouts.dashboardAdmin')
@section('container')
<h1>MANAJEMEN KOS</h1>
<div class="room-grid" data-aos="fade-left" data-aos-duration="800">
    @foreach ($rooms as $room)
        @if ($room->statusPayment === "Kosong")
            <div class="room room-item">
                <i class="fa-solid fa-house-user"></i>
                <h5>{{ $room->nomor_kamar }} - {{ $room->category->name }}</h5>
                <h3>Kosong</h3>
            </div>
        @elseif ($room->statusPayment === "Menunggu")
            <div class="room room-item-waiting">
                <i class="fa-solid fa-house-user"></i>
                <h5>{{ $room->nomor_kamar }} - {{ $room->category->name }}</h5>
                <h3>Menunggu</h3>
            </div>
        @elseif ($room->statusPayment === "Aktif")
            <div class="room room-item-active">
                <i class="fa-solid fa-house-user"></i>
                <h5>{{ $room->nomor_kamar }} - {{ $room->category->name }}</h5>
                <h3>{{ $room->tenant_name}}</h3>
                <h4 style="font-weight: 700;">{{ $room->tgl_keluar }}</h4>
            </div>
        @elseif ($room->statusPayment === "Perpanjang")
            <div class="room room-item-extend">
                <i class="fa-solid fa-house-user"></i>
                <h5>{{ $room->nomor_kamar }} - {{ $room->category->name }}</h5>
                <h3>Perpanjang</h3>
            </div>
        @endif
    @endforeach
</div>
@endsection
