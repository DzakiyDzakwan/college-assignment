let nikUser = document.querySelectorAll(".nikUser");
let statusUser = document.querySelectorAll(".statusUser");
let idUser = document.querySelectorAll(".user_id");
let tableBody = document.querySelector("tbody");

let daftarBtn = document.querySelectorAll(".daftarBtn");

daftarBtn.forEach((param, id) => {
  $(param).on("click", () => {
    nik = nikUser[id].innerText;
    status = statusUser[id].innerText;
    user_id = idUser[id].innerText;

    if (status === "Siswa") {
      let nikMhs = document.querySelector("#nikMhs");
      nikMhs.value = nik;
    } else {
      let nikDosen = document.querySelector("#nikDosen");
      nikDosen.value = nik;
    }

    console.log(nik);
    console.log(status);
    console.log(user_id);
  });
});

/* $.getJSON("js/user.json", (result) => {
  $.each(result, (i, item) => {
    let tableRow = document.createElement("tr");

    tableRow.append(`<td class="user_id d-none">${item.user_id}</td>
    <td class="nikUser">${item.NIK}</td>
    <td>${item.Nama}</td>
    <td>${item.email}</td>
    <td>${item.nomor}</td>
    <td>${item.agama}</td>
    <td>${item.kelamin}</td>
    <td class="statusUser">Dosen</td>
    <td>
      <div class="btn btn-primary daftarBtn" data-bs-toggle="modal" data-bs-target="#dosenModal">
        <i class="bx bx-book-add"></i>
      </div>
      <a href="text-decoration-none text-white">
        <div class="btn btn-danger">
          <i class="bx bx-trash"></i>
        </div>
      </a>
    </td>`);

    tableBody.append(tableRow);
  });
}); */
