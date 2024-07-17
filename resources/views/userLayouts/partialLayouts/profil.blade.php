@extends('userLayouts.dashboardUser')

@section('container')
@if (session()->has('sewaSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sewaSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h1>Biodata Penghuni Sewa</h1>
<div class="container-profil" data-aos="fade-in" data-aos-duration="1000">
    <div class="column">
        <div class="label-profil">
            <label>Nama</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payments->tenant->name }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Nomor Telfon</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payments->tenant->no_hp }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Jenis Kelamin</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payments->tenant->jk }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Alamat Asal</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payments->tenant->alamat }}</label>
        </div>
    </div>
    <hr>
    <div class="column">
        <div class="label-profil">
            <label>Nomor Kamar</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payments->room->nomor_kamar }}</label>
            <label> - </label>
            <label>{{ $payments->room->category->name }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Tanggal Sewa</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payments->tgl_masuk }}</label>
            <label> Sampai </label>
            <label>{{ $payments->tgl_keluar }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Jumlah Penghuni</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payments->tenant->jmlh_anggota }}</label>
            <label> Orang</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Kelengkapan Dokumen</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label><a href="/storage/{{ $payments->tenant->dokumen }}">Dokumen</a></label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Bukti Pembayaran</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label><a href="/storage/{{ $payments->paymentImage }}">Download</a></label>
        </div> 
    </div>
    <hr>
    <div class="profil-button">
        <a href=""><i class="fa-solid fa-pen"></i> Edit Profil</a>
        @if ($payments->statusPayment === "Menunggu")
            <label class="confirm" style="color: blue; font-weight:700;"><i class="fa-solid fa-user-clock"></i> Sedang Ditinjau Admin</label>
        @elseif ($payments->statusPayment === "Aktif")
            <label class="confirm" style="color: green; font-weight:700;"><i class="fa-solid fa-circle-check"></i> Sudah Diverifikasi</label>
        @else
            <label class="confirm" style="color: red; font-weight:700;"><i class="fa-solid fa-circle-xmark"></i> Tidak Aktif</label>
        @endif
    </div>
</div>
@endsection
