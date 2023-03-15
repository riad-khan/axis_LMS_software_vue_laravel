const clickToggleBtn = (e, parent_div, toggle_div) => {
  let noticeCardContainer = e.closest(parent_div);
  let infoContainer = noticeCardContainer.querySelector(toggle_div);

  infoContainer.classList.toggle('active');
  e.classList.toggle('active');
};