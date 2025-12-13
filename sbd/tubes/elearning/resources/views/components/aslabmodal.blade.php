<!-- Modal-Aslab -->
<div class="modal fade" id="aslabTable" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">List Asisten Lab</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- MODAL BODY -->
              <div class="modal-body">
                  <table class="table text-center">

                      @foreach ($aslabs as $aslab)
                      <tr>
                        <td id="user_id" class="d-none">{{$aslab['NIK']}}</td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$aslab['first_name']}} {{$aslab['last_name']}}</td>
                        <td class="text-end d-flex justify-content-center">
                            <div id="enrollbtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aslabEnroll">
                                <i class="bx bx-plus-circle"></i>
                            </div>
                            <form action="/admin/mahasiswa/delete-aslab/{{$aslab['aslab_id']}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                      @endforeach

                  </table>
              </div>

          </div>
      </div>
  </div>
</div>
<!-- Modal Aslab End -->