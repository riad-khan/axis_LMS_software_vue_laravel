const customDropdown = (e) => {
  let listParent = e.nextElementSibling;
  listParent.classList.toggle("active_dropdown");

  let allItems = listParent.children;

  for (let i = 0; i < allItems.length; i++) {
    const el = allItems[i];
    el.setAttribute("onclick", "selectItem(this)");
  }
};

// select item
const selectItem = (e) => {
  let listParent = e.parentNode;
  let input = listParent.previousElementSibling;
  input.value = e.innerHTML;
  e.parentNode.classList.remove("active_dropdown");
};
