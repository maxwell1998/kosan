@extends('formLayouts.form')

@section('container')
<form action="/perpanjang" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row border rounded-5 p-3 bg-white shadow box-area">
    <header>Form Sewa FAW Kostel Padang</header>
    <div class="prolog">
      <p class="mb-1">Harap membaca <a href="">syarat dan ketentuan</a> berlaku sebelum mengisi biodata. 
        atau hubungi pihak pengelola untuk memastikan kamar tersedia atau tidak.</p>
      <a href="https://wa.me/+62895384814634" class="btn btn-success" style="font-weight: 600;" >Hubungi Pengelola Kost</a>
      <hr>
    </div>
    <div class="col-md right-box">
      <div class="input-box">
        <label>Nomor Kamar</label>
        <select class="form-select" aria-label="Default select example" name="room_id" id="room_id" disabled>
            <option name="room_id" id="room_id">{{ $payments->room->nomor_kamar }} - {{ $payments->room->category->name }}</option>
        </select>
      </div>
      <div class="input-box">
        <label>Nama Lengkap</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="{{ $payments->tenant->name }}" disabled>
      </div>
    
      <div class="input-box">
        <label>Nomor Telfon (sekaligus WhatsApp)</label>
        <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="{{ $payments->tenant->no_hp }}" disabled>
      </div>
 
      <div class="input-box">
        <div class="row">
          <div class="col">
            <label>Masa Sewa Terakhir</label>
            <input class="form-control" type="date" name="sewa_terakhir" id="sewa_terakhir" value="{{ $payments->tgl_keluar }}" disabled >
          </div>
          <div class="col">
            <label>Rencana Perpanjang</label>
            <input class="form-control" type="date" name="tgl_keluar" id="tgl_keluar" required min="{{ $payments->tgl_keluar }}">
          </div>
        </div>
      </div>
      <div class="input-box">
        <label>Upload Bukti Pembayaran (format: .jpg .jpeg max:2000kb )</label>
        <input class="form-control" type="file" id="paymentImage" name="paymentImage">
      </div>
      <div class="input-box">
        <label>Nominal Pembayaran</label>
        <input class="form-control" type="text" name="nominal" id="nominal" placeholder="Masukan nominal pembayaran" required>
      </div>
      <div class="input-box">
        <div class="row">
          <div class="col-auto">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="border: 1px solid black;" required>
          </div>
          <div class="col">
            <label class="form-check-label" for="flexCheckDefault">
              Saya setuju dan mengikuti <a href="">syarat dan ketentuan</a> yang berlaku di FAW Kostel Padang
            </label>
          </div>
        </div>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary mt-4 kirim-btn" type="submit">KIRIM FOMULIR</button>
      </div>
      <input type="hidden" name="tenant_id" id="tenant_id" value="{{ $payments->tenant->id }}">
      <input type="hidden" name="room_id" id="room_id" value="{{ $payments->room->id }}">
      <input type="hidden" name="tgl_masuk" id="tgl_masuk" value="{{ $payments->tgl_keluar }}">
    </div>
  </div>
</form>
@endsection