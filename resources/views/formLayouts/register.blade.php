<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <title>FAW Kostel | Register</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="main d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="container border rounded-5 p-3 bg-white shadow">

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="box-items">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Daftar Akun</h2>
                     <p>Isi datamu dengan benar untuk melanjutkan.</p>
                </div>
                <form action="/register" method="post">
                @csrf
                    <div class="input-group mb-2">
                        <input type="text" name="name" class="form-control form-control-lg bg-light fs-6 @error('name') is-invalid @enderror" 
                        placeholder="Nama Lengkap" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" name="email" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror"
                        placeholder="Email address" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" name="password" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror"
                        placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mt-5 mb-3">
                        <button type="submit" class="btn btn-lg w-100 fs-6" style="background: #1a4d2e; color:white;">Daftar</button>
                    </div>
                </form>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6"><img src="assets/google.png" style="width:20px" class="me-2"><small>Daftar dengan Google</small></button>
                </div>
                <div class="row">
                    <small>Sudah ada akun? <a href="/login">Kembali masuk</a></small>
                </div>
          </div>
       </div> 

      </div>
    </div>

</body>
</html>