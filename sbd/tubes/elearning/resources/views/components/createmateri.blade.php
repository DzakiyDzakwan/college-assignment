<!-- create materi -->
<?php use App\Models\Materi;
use App\Models\Pertemuan;?>
<div class="modal fade" id="addmateri" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Materi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
      <div class="modal-body">
        <form action="/user/matakuliah/createMateri" method="POST" class="text-dark ">
          @csrf
          <label for="nama_materi">Nama Materi</label>
          <input class="form-control mb-3" type="text" name="nama_materi" id="nama_materi" required>
          
          <label for="deskripsi">Link Materi</label>
          <input class="form-control mb-3" type="text" name="deskripsi" id="">
          {{-- <textarea class="form-control mb-3" id="deskripsi" rows="3" name="deskripsi"></textarea> --}}

          @foreach($pertemuan as $prtm)
          <?php $materis = Pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')
          ->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')
          ->select('pertemuans.pertemuan_id','kelas.mata_kuliah','kelas.kelas','mata_kuliahs.nama_matkul')
          ->where('pertemuans.pertemuan_id', $prtm->pertemuan_id)->get(); ?>
              <input type="" class="col form-control mb-2" id="pertemuan" name="pertemuan" value="{{$prtm->pertemuan_id}}">
          @endforeach
          <input class="btn btn-success form-control" type="submit" value="SUBMIT" />
        </form>
      </div>
      </div>
  </div>
</div>
<!-- create materi end -->