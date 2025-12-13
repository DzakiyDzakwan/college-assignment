<!-- create pertemuan -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Pertemuan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
      <div class="modal-body">
        <form action="/user/matakuliah/createPertemuan" method="POST" class="text-dark ">
          @csrf
          <label for="nama_pertemuan">Nama Pertemuan</label>
          <input class="form-control mb-3" type="text" name="nama_pertemuan" id="nama_pertemuan" required>
          
          <label for="link">Link Pertemuan</label>
          {{-- <textarea class="form-control mb-3" id="deskripsi" rows="3" name="deskripsi"></textarea> --}}
          <input class="form-control mb-3" type="text" name="link" id="link" required>

          <label for="tanggal_pertemuan">Tanggal Pertemuan</label>
          <input class="form-control mb-3" type="date" name="tanggal_pertemuan" id="tanggal_pertemuan">
          @foreach($juduls as $kls)
          <input type="hidden" class="col form-control mb-2" id="kelas" name="kelas" value="{{$kls->kelas_id}}">
          @endforeach
          <input class="btn btn-success form-control" type="submit" value="SUBMIT" />
        </form>
      </div>
      </div>
  </div>
</div>
<!-- create pertemuan end -->