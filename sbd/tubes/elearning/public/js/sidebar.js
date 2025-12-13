let profileButton = document.querySelector(".profile-container");

let popover = document.querySelector(".popover");

profileButton.addEventListener("click", () => {
  if (popover.style.display === "none") {
    popover.style.display = "block";
  } else {
    popover.style.display = "none";
  }
});
