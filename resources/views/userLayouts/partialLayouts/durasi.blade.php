@extends('userLayouts.dashboardUser')

@section('container')
@if (session()->has('extendError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('extendError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="user-time">
    <h3 data-aos="fade-right" data-aos-duration="1200">Sisa Durasi Masa Sewa</h3>
    <div class="simply-countdown" data-aos="zoom-out" data-aos-duration="1200"></div>
    <div class="perpanjang-button" data-aos="fade-in" data-aos-duration="1200">
      <a href="/durasi/perpanjang">Perpanjang Masa Sewa</a>
    </div>
</div>
<div class="user-log" data-aos="fade-up" data-aos-duration="1000">
    <h3>Riwayat Pembayaran</h3>
    <table class="table" id="table">
        <thead class="table-head">
          <tr>
            <th>Tanggal Transaksi</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Bukti Pembayaran</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($payments as $payment)
          <tr>
            <td>{{ $payment->created_at->format('d F Y') }}</td>
            <td>{{ $payment->tgl_masuk }}</td>
            <td>{{ $payment->tgl_keluar }}</td>
            <td><a href="/storage/{{ $payment->paymentImage }}">Bukti Pembayaran</a></td>
            @if($payment->statusPayment == "Perpanjang")
            <td class="w-auto text-center" style="background-color: blue; color:white; font-weight:700;">Menunggu Konfirmasi</td>
            @else
            <td class="w-auto text-center" style="background-color: green; color:white; font-weight:700;">Aktif</td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
      <input type="hidden" name="last_duration" id="last_duration" value="{{ $payments_last->tgl_keluar }}">
</div>
@endsection

