@extends('userLayouts.dashboardUser')

@section('container')
<div class="feedback">
    <form class="form-feedback"  data-aos="zoom-in-down">
        <div class="label-feednack">
            <h2>Kirim Masukan Anda</h2>
            <hr>
        </div>
        <div class="items">
            <div class="item-column">
                <i class="fa-solid fa-door-open"></i>
                <input type="number" placeholder="Masukan nomor kamar anda" required>
            </div>
            <div class="item-column">
                <i class="fa-solid fa-user-tag"></i>
                <input type="text" placeholder="Masukan nama anda" required>
            </div>
            <div class="item-column">
                <i class="fa-brands fa-whatsapp"></i>
                <input type="number" placeholder="Masukan nomor anda" required>
            </div>
            <textarea cols="30" rows="5" placeholder="Masukan komentar anda"></textarea>
        </div>
        <button type="submit">SUBMIT <i class="fa-solid fa-envelope-circle-check"></i></button>
    </form>
</div>
@endsection
