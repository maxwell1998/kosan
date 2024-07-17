@extends('adminLayouts.dashboardAdmin')

@section('container')
<div class="container-tambah">
  <div class="container-md">
    <h1>Form Tambah Jumlah Kamar</h1>
  <form action="/jmlhKamar/tambah-kamar" method="post">
    @csrf
    <div class="row">
      <div class="col">
        <div class="input-box">
          <label>Nomor Kamar (Sertakan kode untuk nomor lantai)</label>
          <input class="form-control @error('nomor_kamar') is-invalid @enderror" type="text" 
          placeholder="Masukan nomor kamar" name="nomor_kamar" id="nomor_kamar" required aria-label="default input example">
          @error('nomor_kamar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <div class="col">
        <div class="input-box">
          <label>Kategori Kamar</label>
          <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id" id="category_id">
              <option selected hidden value="">Pilih kamar anda</option>
              @foreach ($categories as $category)
                <option name="category_id" id="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
          @error('category_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-primary mt-4 kirim-btn" type="submit">TAMBAH KAMAR</button>
    </div>
  </form>
  </div>
</div>
@endsection