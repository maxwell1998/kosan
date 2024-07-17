@extends('adminLayouts.dashboardAdmin')

@section('container')
<div class="container-tambah">
  <div class="container-md">
    <h1>Form Tambah Kategori Kamar</h1>
  <form action="/jnsKamar/tambah-kategori" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-box">
      <label for="image" class="form-label">Foto Jenis Kamar</label>
      <img class="img-preview img-fluid">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="input-box">
      <label>Nama Kategori</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" 
      placeholder="Masukan nama kategori" aria-label="default input example" required autofocus>
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="input-box">
      <label>Fasilitas (pisahkan dengan tanda koma)</label>
      <textarea class="form-control @error('fasilitas') is-invalid @enderror" 
      placeholder="Masukan alamat anda" name="fasilitas" id="fasilitas" required></textarea>
      @error('fasilitas')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="row">
      <div class="col">
        <div class="input-box">
          <label>Harga Per Hari</label>
          <input class="form-control @error('priceDay') is-invalid @enderror" type="text" placeholder="Masukan harga" 
          name="priceDay" id="priceDay" required aria-label="default input example">
          @error('priceDay')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <div class="col">
        <div class="input-box">
          <label>Harga Per Minggu</label>
          <input class="form-control @error('priceWeek') is-invalid @enderror" type="text" placeholder="Masukan harga" 
          name="priceWeek" id="priceWeek" required  aria-label="default input example">
          @error('priceWeek')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <div class="col">
        <div class="input-box">
          <label>Harga Per Bulan</label>
          <input class="form-control @error('priceMonth') is-invalid @enderror" type="text" placeholder="Masukan harga" 
          name="priceMonth" id="priceMonth" required  aria-label="default input example">
          @error('priceMonth')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-primary mt-4 kirim-btn" type="submit">TAMBAH KATEGORI</button>
    </div>
  </form>
  </div>
</div>

{{-- <script>
  function previewImage() {
    const image = document.querySelector("#image");
    const imagePreview = document.querySelector("img-preview");

    imagePreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imagePreview.src = oFREvent.target.result;
    };
}
</script> --}}
@endsection