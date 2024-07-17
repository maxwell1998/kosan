@extends('adminLayouts.dashboardAdmin')

@section('container')

<h1>Biodata Penghuni Sewa</h1>
<div class="container-profil" data-aos="fade-in" data-aos-duration="1000">
    <div class="column">
        <div class="label-profil">
            <label>Nama</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payment->tenant->name }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Nomor Telfon</label>
        </div>
        <label> : </label>
        <div class="input-profil">
           <a href="https://wa.me/{{ $payment->tenant->no_hp }}">{{ $payment->tenant->no_hp }}</a>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Jenis Kelamin</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payment->tenant->jk }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Alamat Asal</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payment->tenant->alamat }}</label>
        </div>
    </div>
    <hr>
    <div class="column">
        <div class="label-profil">
            <label>Nomor Kamar</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payment->room->nomor_kamar }}</label>
            <label> - </label>
            <label>{{ $payment->room->category->name }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Tanggal Sewa</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payment->tgl_masuk }}</label>
            <label> Sampai </label>
            <label>{{ $payment->tgl_keluar }}</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Jumlah Penghuni</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label>{{ $payment->tenant->jmlh_anggota }}</label>
            <label> Orang</label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Kelengkapan Dokumen</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label><a href="/storage/{{ $payment->tenant->dokumen }}">Dokumen</a></label>
        </div>
    </div>
    <div class="column">
        <div class="label-profil">
            <label>Bukti Pembayaran</label>
        </div>
        <label> : </label>
        <div class="input-profil">
            <label><a href="/storage/{{ $payment->paymentImage }}">Bukti Pembayaran</a></label>
        </div>
    </div>
    <hr>
    @if ($payment->statusPayment === "Menunggu")
    <div class="profil-button">
        <a href="/penghuni/sewa-{{ $payment->id }}-diterima" id="terima"><i class="fa-solid fa-user-plus"></i> Terima Penyewa</a>
        <a href="/penghuni/sewa-{{ $payment->id }}-ditolak" id="tolak"><i class="fa-solid fa-circle-xmark"></i> Tolak Penyewa</a>
    </div>
    @elseif($payment->statusPayment === "Perpanjang")
    <div class="profil-button">
        <a href="/penghuni/perpanjang-{{ $payment->id }}-diterima" id="terima"><i class="fa-solid fa-circle-check"></i> Perpanjang Sewa</a>
        <a href="/penghuni/perpanjang-{{ $payment->id }}-ditolak" id="tolak"><i class="fa-solid fa-circle-xmark"></i> Tolak Sewa</a>
    </div>
    @else
    <div class="profil-button">
        <a href="/penghuni/sewa-{{ $payment->tenant->id }}-ditolak" id="tolak"><i class="fa-solid fa-circle-xmark"></i> Keluarkan Penghuni</a>
    </div>
    @endif
</div>
@endsection
