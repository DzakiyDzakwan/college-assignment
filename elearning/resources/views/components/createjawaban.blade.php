<!-- create pertemuan -->
<div class="modal fade" id="addJawaban" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Masukan Jawaban</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
      <div class="modal-body">
        <form action="/user/tugas/store-jawaban" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="file" class="form-label">Masukkan file</label>
            <input class="form-control" type="file" id="file" name="file">
          </div>
  
          <div>
            <label for="jawaban" class="form-label">Text Jawaban</label>
            <input id="jawaban" type="hidden" name="jawaban" value="{{ old('jawaban') }}">
            <trix-editor input="jawaban"></trix-editor>
          </div>
            <input type="hidden" name="NIM" id="NIM" value="{{$nim}}">
            <input type="hidden" name="tugas" id="tugas" value="{{ $tugas->tugas_id}}">
          <button class="d-block container-fluid btn btn-outline-success mx-auto my-3" type="submit">Add submission</button>
        </form>
      </div>
      </div>
  </div>
</div>
<!-- create pertemuan end -->