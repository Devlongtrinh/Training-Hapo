$(document).ready(function () {

  const stars = $('.js-rate');
  let num = 0;

  stars.each(function () {
    $(this).click(function () {
      const currentIndex = stars.index($(this));
      $('#inputRate').val(currentIndex + 1);
      let index = 0;
      stars.each(function () {
        if (index > currentIndex)
          $(this).removeClass('active');
        else
          $(this).addClass('active');
        index++;
      })
      num = $('.js-rate.active').length;
    });

    $(this).hover(function () {
      const currentIndex = stars.index($(this));
      let index = 0;
      stars.each(function () {
        if (index > currentIndex) return false;
        $(this).addClass('active');
        index++;
      });
    }, function () {
      let index = 0;
      stars.each(function () {
        if (index >= num)
          $(this).removeClass('active');
        index++;
      });
    });
  });
});
