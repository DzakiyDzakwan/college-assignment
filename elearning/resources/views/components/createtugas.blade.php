<!-- create materi -->
<?php use App\Models\Materi;
use App\Models\Pertemuan;?>

<div class="modal fade" id="addtugas{{$loop->iteration}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Materi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
      <div class="modal-body">
        <form action="/user/tugas/create" method="POST" class="text-dark ">
          @csrf

          <input type="hidden" name="pertemuan" value="{{$prtm->pertemuan_id}}">

          <label for="nama_tugas">Nama Tugas</label>
          <input class="form-control mb-3" type="text" name="nama_tugas" id="nama_tugas" placeholder="" required>
          
          <label for="deskripsi">Deskripsi</label>
          <textarea class="form-control mb-3" id="deskripsi" rows="3" name="deskripsi"></textarea>

          <label for="deadline">Deadline</label>
          <input class="form-control mb-3" type="date" name="deadline" id="deadline" required>

          <input class="btn btn-success form-control" type="submit" value="SUBMIT" />
        </form>
      </div>
      </div>
  </div>
</div>
<!-- create materi end -->