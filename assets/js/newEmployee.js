/**
 * Form submit
 *
 */
$(".needs-validation").on("submit", function (event) {
  removeClassInvalid();

  if (!event.target.checkValidity()) {
    addClassInvalid();
    return false;
  }
});

/**
 * render validation
 *
 */
function addClassInvalid() {
  $(".needs-validation input[required]").each(function () {
    if (!this.validity.valid) $(this).addClass("is-invalid");
  });
}

/**
 * render validation
 *
 */
function removeClassInvalid() {
  $(".needs-validation input").each(function () {
    if ($(this).hasClass("is-invalid")) $(this).removeClass("is-invalid");
  });
}
