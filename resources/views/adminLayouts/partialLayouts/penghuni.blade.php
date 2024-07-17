@extends('adminLayouts.dashboardAdmin')

@section('container')
<h1>Manajemen Penghuni</h1>
@if (session()->has('sewaDiterima'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sewaDiterima') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('extendDiterima'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('extendDiterima') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('sewaDitolak'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('sewaDitolak') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('extendDitolak'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('extendDitolak') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="table-huni-container">
    <table class="table">
        <thead class="table-head">
          <tr>
            <th>Nomor</th>
            <th>Nama Penghuni</th>
            <th>Nomor Hp</th>
            <th>Dokumen</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Pembayaran Terbaru</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($tenant_active as $tenant)
        @if($tenant['data_payment'] === "Ada")
          <tr>
              <td>{{ $tenant->nomor_kamar }} - {{ $tenant->category_name }}</td>
              <td>{{ $tenant->name }}</td>
              <td><a href="https://wa.me/{{ $tenant->no_hp }}">{{ $tenant->no_hp }}</a></td>
              <td><a href="storage/{{ $tenant->dokumen }}">Dokumen</a></td>
              <td>{{ $tenant->tgl_masuk }}</td>
              <td>{{ $tenant->tgl_keluar }}</td>
              <td><a href="storage/{{ $tenant->paymentImage }}">Foto</a></td>
              <td class="text-center">
                  <a href="/penghuni/review-{{ $tenant->id }}"><i class="fa-solid fa-rectangle-list"></i></a>
                  <a href="/penghuni/sewa-{{ $tenant->id  }}-ditolak" id="tolak" onclick="return confirm('Apakah kamu yakin menghapus penyewa?')"><i class="fa-solid fa-user-slash"></i></a>
              </td>
          </tr>
        @endif
        @endforeach
        </tbody>
      </table>
</div>
<hr>
  
  <div class="table-waiting-container">
    <h3>Waitting List</h3>
      <table class="table">
          <thead class="table-head">
              <tr>
                  <th>Nomor Kamar</th>
                  <th>Nama</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Keluar</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($payment_waiting as $payment)
             <tr>
              <td>{{ $payment->room->nomor_kamar }} - {{ $payment->room->category->name }}</td>
              <td>{{ $payment->tenant->name }}</td>
              <td>{{ $payment->tgl_masuk }}</td>
              <td>{{ $payment->tgl_keluar }}</td>
              <td><a href="/penghuni/review-{{ $payment->id }}"><i class="fa-solid fa-rectangle-list"></i></a></td>
            </tr>
            @endforeach
          </tbody>
      </table>
  </div>
  <div class="table-waiting-container mt-3">
    <h3>Perpanjang Durasi Sewa</h3>
      <table class="table">
          <thead class="table-head">
              <tr>
                  <th>Nomor Kamar</th>
                  <th>Nama</th>
                  <th>Tanggal Keluar</th>
                  <th>Tanggal Perpanjang</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($payment_extend as $payment)
              <tr>
                  <td>{{ $payment->room->nomor_kamar }} - {{ $payment->room->category->name }}</td>
                  <td>{{ $payment->tenant->name }}</td>
                  <td>{{ $payment->tgl_masuk }}</td>
                  <td>{{ $payment->tgl_keluar }}</td>
                  <td><a href="/penghuni/extend-{{ $payment->id }}"><i class="fa-solid fa-rectangle-list"></i></a></td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
@endsection