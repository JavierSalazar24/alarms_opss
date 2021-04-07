$(document).on("click", ".list-group-item", function () {
  $(this).addClass("activeNoticias").siblings().removeClass("activeNoticias");
});
