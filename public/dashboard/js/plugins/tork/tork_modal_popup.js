const modalBtn = document.querySelectorAll('[data-toggle="modal"]');

modalBtn.forEach((e) => {
  e.setAttribute("onclick", "showModal(this)");
});

const showModal = (e) => {
  let targetModalId = e.getAttribute("data-ti-target");
  let targetModal = document.querySelector(targetModalId);
  targetModal.classList.add("show_tork_modal");
    // hide modal
  targetModal.onclick = dismissModal;
};

const dismissModal = (e) => {
  e.target.classList.remove("show_tork_modal");
};
