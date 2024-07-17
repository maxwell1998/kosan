@extends('formLayouts.form')

@section('container')
<form action="/sewa" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row border rounded-5 p-3 bg-white shadow box-area">
    <header>Form Sewa FAW Kostel Padang</header>
    <div class="prolog">
      <p class="mb-1">Harap membaca <a href="">syarat dan ketentuan</a> berlaku sebelum mengisi biodata. 
        atau hubungi pihak pengelola untuk memastikan kamar tersedia atau tidak.</p>
      <a href="https://wa.me/+62895384814634" class="btn btn-success" style="font-weight: 600;" >Hubungi Pengelola Kost</a>
      <hr>
    </div>
    <div class="col-md-6 left-box">
      <div class="input-box">
        <label>Nomor Kamar</label>
        <select class="form-select" aria-label="Default select example" name="room_id" id="room_id" required>
          @foreach ($rooms as $room)
            <option name="room_id" id="room_id" value="{{ $room->id }}">{{ $room->nomor_kamar }} - {{ $room->category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="input-box">
        <label>Nama Lengkap</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Masukan nama lengkap anda" autofocus required>
      </div>
      <div class="input-box">
        <div class="row">
          <label>Jenis Kelamin</label>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki - Laki" checked>
              <label class="form-check-label" for="jk">
                Laki-Laki
              </label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan">
              <label class="form-check-label" for="jk">
                Perempuan
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="input-box">
        <label>Nomor Telfon (sekaligus WhatsApp)</label>
        <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="Masukan nomor telfon sekaligus WhatsApp anda" required>
      </div>
      <div class="input-box">
        <label>Alamat</label>
        <textarea class="form-control" placeholder="Masukan alamat anda" name="alamat" id="alamat" required></textarea>
      </div>
    </div>
    <div class="col-md-6 right-box">
      <div class="input-box">
        <div class="row">
          <div class="col">
            <label>Penghuni</label>
            <select class="form-select" aria-label="Default select example" name="jmlh_anggota" id="jmlh_anggota">
              <option selected hidden>Jumlah penghuni</option>
              <option name="jmlh_anggota" id="jmlh_anggota" value="1">1 Orang</option>
              <option name="jmlh_anggota" id="jmlh_anggota" value="2">2 Orang</option>
              <option name="jmlh_anggota" id="jmlh_anggota" value="3">3 Orang</option>
              <option name="jmlh_anggota" id="jmlh_anggota" value="4">4 Orang</option>
              <option name="jmlh_anggota" id="jmlh_anggota" value="5">Lebih dari 4 orang</option>
            </select>
          </div>
          <div class="col">
            <label>Tanggal Masuk</label>
            <input class="form-control" type="date" name="tgl_masuk" id="tgl_masuk" required>
          </div>
          <div class="col">
            <label>Tanggal Keluar</label>
            <input class="form-control" type="date" name="tgl_keluar" id="tgl_keluar" required>
          </div>
        </div>
      </div>
      <div class="input-box">
        <label>Upload Dokumen Kelengkapan (format: .pdf max:2000kb )</label>
        <input class="form-control" type="file" id="dokumen" name="dokumen">
      </div>
      <div class="input-box">
        <label>Upload Bukti Pembayaran (format: .jpg .jpeg max:2000kb )</label>
        <input class="form-control" type="file" id="paymentImage" name="paymentImage">
      </div>
      <div class="input-box">
        <label>Nominal Pembayaran (Cicilan Wajib Di Atas 50% Harga Total)</label>
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
    </div>
  </div>
</form>
@endsection