$(function () {
  $('.btn-filter').on('click', function () {
    $('.course-filter').toggleClass('active');
  });

  const radios = $('input[type="radio"]');
  checkLabel();

  radios.each(function () {
    $(this).on('click', function () {
      $('label.active').removeClass('active');
      checkLabel();
    });
  });

  function checkLabel() {
    radios.each(function () {
      if ($(this).is(":checked")) {
        const label = $('label[for=' + $(this).attr("id") + ']');
        label.addClass('active');
      }
    });
  }
});