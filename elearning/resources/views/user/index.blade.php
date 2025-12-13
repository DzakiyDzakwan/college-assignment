<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login Elearning USU</title>
</head>
<body class="bg-secondary bg-opacity-10">

    <div class="container mb-5 mt-5">
        <div class="row">
          
          <div class="col col-md-7 my-4">
            <h3><b>Learning Management System</b></h3>
            <h4><b>E-Learning Universitas Sumatera Utara</b></h4>
          </div>

          <!--Form Login-->
          <div class="col my-4">
            <div class="card mx-auto border-0 shadow" style="max-width: 400px">
                <div class="card-body ml-auto">
                  <img src="https://elearning2.usu.ac.id/pluginfile.php/1/core_admin/logo/0x200/1648753770/usu-kampusmerdeka.png" alt="" width="365px">
                    <form action="/" method="post">
                      @csrf
                      @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('success') }}
                      </div>
                      @endif
                      @if(session()->has('loginError'))
                      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        {{ session('loginError') }}
                      </div>
                      @endif
                        <div class="row mt-2 mb-3">
                            <div class="col">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" aria-label="" autofocus required value="{{ old('email') }}">
                            @error('email')
                              <div class="div invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="" required>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Remember username</label>
                        </div>
                        <div class="d-grid gap-2 mb-4">
                            <button class="btn btn-primary " type="submit"><a href="/user" class="text-decoration-none text-light">LOG IN</a></button>
                            <a href="/register" class="btn btn-secondary text-light fw-light" type="forgotpass">Register</a>
                            {{-- <button class="btn btn-light" type="forgotpass">FORGET PASSWORD</button> --}}
                            
                        </div>
                    </form>
                    <p class="text-secondary text-center">Supported Browser</p>
                  <img src="https://www.contact-supportnumber.com/blog/wp-content/uploads/2020/06/yahoo-mail-supported-browsers.png" alt="" width="365px">
                </div>
            </div>
          </div>
          <!--End form-->
          
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>