<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register Elearning USU</title>
</head>
<body class="bg-secondary bg-opacity-10">

    <div class="container mb-5 mt-5">
        <div class="row">
          
          <div class="col col-md-7 my-4">
            <h3><b>Learning Management System</b></h3>
            <h4><b>E-Learning Universitas Sumatera Utara</b></h4>
          </div>

          <!--Form Register-->
          <div class="col my-4">
            <div class="card mx-auto border-0 shadow" style="max-width: 400px">
                <div class="card-body ml-auto">
                  <img src="https://elearning2.usu.ac.id/pluginfile.php/1/core_admin/logo/0x200/1648753770/usu-kampusmerdeka.png" alt="" width="365px">
                    <form action="/register" method="post">
                      @csrf
                        <div class="row mt-1 mb-2">
                            <div class="col">
                            <input type="text" class="form-control @error('NIK')is-invalid @enderror" placeholder="NIK" aria-label="" name="NIK">
                            @error('NIK')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                            <input type="email" class="form-control @error('email')is-invalid @enderror" placeholder="usu@gmail.com" aria-label="" name="email">
                            @error('email')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col">
                          <input type="text" class="form-control @error('nomor_hp')is-invalid @enderror" placeholder="Nomor HP" aria-label="" name="nomor_hp">
                          @error('nomor_hp')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                      </div>
                        <div class="row mb-2">
                            <div class="col">
                            <input type="text" class="form-control @error('first_name')is-invalid @enderror" placeholder="First Name" aria-label="" name="first_name">
                            @error('first_name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                            <input type="text" class="form-control @error('last_name')is-invalid @enderror" placeholder="Last Name" aria-label="" name="last_name">
                            @error('last_name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>
                        <div><p class="my-1">Jenis Kelamin</p>
                          <select class="form-select my-3" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="PRIA">PRIA</option>
                            <option value="WANITA">WANITA</option>
                          </select>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                            <input type="text" class="form-control @error('agama')is-invalid @enderror" placeholder="Agama" aria-label="" name="agama">
                            @error('agama')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>
                        <div><p class="my-1">Kewarganegaraan</p>
                          <select class="form-select my-3" aria-label="Default select example" id="kewarganegaraan" name="kewarganegaraan">
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                          </select>
                        <div class="row mb-2">
                            <div class="col">
                            <input type="password" class="form-control @error('password')is-invalid @enderror" placeholder="Password" aria-label="" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>
                        <div><p class="my-1">Status</p>
                          <select class="form-select my-3" aria-label="Default select example" id="status" name="status">
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            {{-- <option value="admin">admin</option> --}}
                          </select>
                        </div>
                        <div class="row mb-2">
                          <div class="col">
                          <input type="text" class="form-control @error('alamat')is-invalid @enderror" placeholder="Alamat" aria-label="" name="alamat">
                          @error('alamat')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col">
                        <input type="date" class="form-control @error('tgl_lahir')is-invalid @enderror" placeholder="Tanggal Lahir" aria-label="" name="tgl_lahir">
                        @error('tgl_lahir')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                        <div class="d-grid gap-3 mb-4">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                        <small class="d-block text-center my-1">Sudah Punya akun? <a href="/">Login disini!</a></small>
                    </form>
                </div>
            </div>
          </div>
          <!--End form-->
          
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>