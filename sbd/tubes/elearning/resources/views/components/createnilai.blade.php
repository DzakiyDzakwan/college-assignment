<!-- create pertemuan -->
<div class="modal fade" id="addNilai{{$loop->iteration}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Beri Nilai</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
      <div class="modal-body">
        <form action="/user/tugas/createnilai" method="POST" class="text-dark ">
          @csrf
          @method('patch')

          <label for="nilai">Nilai</label>
          <input class="form-control mb-3" type="number" name="nilai" id="nilai" required>
          
          <label for="link">Keterangan</label>
          {{-- <textarea class="form-control mb-3" id="deskripsi" rows="3" name="deskripsi"></textarea> --}}
          <input class="form-control mb-3" type="text" name="keterangan" id="keterangan" required>

          {{-- <label for="tanggal_pertemuan">Tanggal Pertemuan</label>
          <input class="form-control mb-3" type="date" name="tanggal_pertemuan" id="tanggal_pertemuan"> --}}
          <input type="hidden" class="col form-control mb-2" id="jawaban" name="jawaban" value="{{$jwb->jawaban_id}}">
          <input class="btn btn-success form-control" type="submit" value="SUBMIT" />
        </form>
      </div>
      </div>
  </div>
</div>
<!-- create pertemuan end -->