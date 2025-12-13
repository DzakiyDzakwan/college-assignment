let enrollBtn = document.querySelectorAll("#enrollbtn");
let userId = document.querySelectorAll("#user_id");

$(enrollBtn).each((id, param) => {
  $(param).on("click", () => {
    let user = userId[id].innerText;
    let userModal = document.querySelector("#nik");
    userModal.value = user;
  });
});
