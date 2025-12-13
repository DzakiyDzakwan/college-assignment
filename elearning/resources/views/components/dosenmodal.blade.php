<!-- DOSEN MODAL -->
<div class="modal fade" id="dosenModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      {{-- <!-- ALERT -->
      <div class="alert alert-danger alert-dismissible fade show text-center position-absolute" role="alert" style="width: 100%;">
        <strong>NIM</strong> Sudah tersedia.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <!-- ALERT END --> --}}
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Create Akun Dosen</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form class="form-floating" action="/admin/user/create-dosen" method="POST">
                    @csrf
                    <div class="form-floating my-3">
                      <input type="text" class="form-control" id="nikDosen" placeholder="NIK" value="" name="NIK">
                      <label for="nikDosen">NIK</label>
                    </div>

                    <div class="form-floating my-3">
                      <input type="text" class="form-control" id="NIP" placeholder="NIP" autocomplete="off" name="NIP">
                      <label for="NIP">NIP</label>
                    </div>

                    <div class="form-floating my-3">
                      <input type="text" class="form-control" id="nidn" placeholder="NIDN" autocomplete="off" name="NIDN">
                      <label for="nidn">NIDN</label>
                    </div>
                    
                    <button class="btn btn-success d-block mx-auto" type="submit" style="width: 100px;">SUBMIT</button>

                  </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!-- DOSEN MODAL END -->