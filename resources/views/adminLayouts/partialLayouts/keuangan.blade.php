@extends('adminLayouts.dashboardAdmin')

@section('container')
<h1>Rekapitulasi Data Keuangan</h1>
<div class="table-keuangan-container">
    <table class="table" id="myTable">
        <thead class="table-head">
            <tr>
                <th>Tanggal Pembayaran</th>
                <th>Nama Penyewa</th>
                <th>Nomor Kamar</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Nominal</th>
                <th>Bukti Pembayaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->created_at->format('d F Y') }}</td>
                <td>{{ $payment->tenant->name }}</td>
                <td>{{ $payment->room->nomor_kamar }} - {{ $payment->room->category->name }}</td>
                <td>{{ $payment->tgl_masuk }}</td>
                <td>{{ $payment->tgl_keluar }}</td>
                <td>{{ $payment->nominal }}</td>
                <td><a href="storage/{{ $payment->paymentImage }}">Dokumen</a></td>
                <td>
                    <a href=""><i class="fa-solid fa-file-pen"></i></a>
                    <a href=""><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="table-foot">
            <tr>
                <td colspan="6">
                    <a href=""><i class="fa-solid fa-calendar-day"></i> Pilih Rentang Data</a>
                    <a href="/generate-pdf"><i class="fa-solid fa-print"></i></i> Print Data</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>