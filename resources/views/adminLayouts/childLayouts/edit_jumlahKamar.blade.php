@extends('adminLayouts.dashboardAdmin')

@section('container')
<div class="container-tambah">
  <div class="container-md">
    <h1>Form Tambah Jumlah Kamar</h1>
@foreach($rooms as $room)
  <form action="/jmlhKamar/edit-kamar-{{ $room->id }}" method="post">
    @csrf
    <div class="row">
      <div class="col">
        <div class="input-box">
          <label>Nomor Kamar (Sertakan kode untuk nomor lantai)</label>
          <input class="form-control @error('nomor_kamar') is-invalid @enderror" type="text" value="{{ $room->nomor_kamar }}" name="nomor_kamar" 
          id="nomor_kamar" required aria-label="default input example">
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
            @foreach ($categories as $category)
              <option name="category_id" id="category_id" 
              value="{{ $category->id }}" @if ($room->category_id === $category->id) selected @endif>
                {{ $category->name }}
              </option>
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
      <button class="btn btn-primary mt-4 kirim-btn" type="submit">EDIT DATA KAMAR</button>
    </div>
  </form>
@endforeach
  </div>
</div>
@endsection