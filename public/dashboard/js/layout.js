// Left sidebar toggler
const togglerBtn = document.querySelector("#togglerBtn");
const leftSiderBar = document.querySelector(".left_sidebar");
const closeBtn = document.querySelector("#closeBtn");

togglerBtn.addEventListener("click", () => {
  leftSiderBar.classList.toggle("active_menu");
});

closeBtn.addEventListener("click", () => {
  leftSiderBar.classList.remove("active_menu");
});
