// init Isotope
var $grid = $(".course_items").isotope({
  // options
});
// filter items on button click
$(".filter_item").on("click", "li", function () {
  var filterValue = $(this).attr("data-filter");
  $grid.isotope({filter: filterValue});
  $(this).addClass("active").siblings().removeClass("active");
});
