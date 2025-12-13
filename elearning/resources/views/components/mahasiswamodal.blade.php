<!-- Modal Mahasiswa -->
<div class="modal fade" id="mhsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        
        {{-- <!-- ALERT -->
        <div class="alert alert-danger alert-dismissible fade show text-center position-absolute" role="alert" style="width: 100%;">
          <strong>NIM</strong> Sudah tersedia.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- ALERT END --> --}}

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create Akun Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="form-floating" action="/admin/user/create-mahasiswa" method="POST">
                      @csrf

                      <div class="form-floating my-3">
                        <input type="text" class="form-control" id="nikMhs" placeholder="nik" value="NIK" name="NIK">
                        <label for="nikMhs">NIK</label>
                      </div>

                      <div class="form-floating my-3">
                        <input type="text" class="form-control" id="nim" placeholder="NIM" autocomplete="off" name="NIM">
                        <label for="nim">NIM</label>
                      </div>
                      
                      <div class="form-floating my-3">
                        <input type="text" class="form-control" id="NISN" placeholder="NISN" autocomplete="off" name="NISN">
                        <label for="NISN">NISN</label>
                      </div>

                      <div class="form-floating my-3">
                        <input type="text" class="form-control" id="Angkatan" placeholder="20**" value="" name="angkatan">
                        <label for="Angkatan">Angkatan</label>
                      </div>

                      <div class="form-floating my-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="program">
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                        <label for="floatingSelect">Program</label>
                      </div>

                      <div class="form-floating my-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jurusan">
                          @foreach ($jurusans as $jurusan)
                          <option value="{{$jurusan['kode_jurusan']}}">{{$jurusan['nama_jurusan']}}</option>
                          @endforeach
                        </select>
                        <label for="floatingSelect">Jurusan</label>
                      </div>
                      
                      <button class="btn btn-success d-block mx-auto" type="submit" style="width: 100px;">SUBMIT</button>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAHASISWA MODAL END -->