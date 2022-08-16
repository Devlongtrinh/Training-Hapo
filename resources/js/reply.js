$(document).ready(function () {
  $('.js-btn-review').on('click', function (e) {
    $(this).closest('.review').find(".reply").focus();;
  });

  $('.js-btn-reply').on('click', function (e) {
    $(this).closest('.reply').find(".reply").focus();;
  });

  $('.js-btn-edit-review').on('click', function (e) {
    let reviewContent = $(this).closest('.review').find(".review-content");
    let editReview = $(this).closest('.review').find(".edit-review");
    reviewContent.toggle();
    $(this).closest('.review').find(".form-edit-review").toggle();
    editReview.focus();
    editReview.text(reviewContent.text());
  })

  $('.js-btn-edit-reply').on('click', function (e) {
    let replyContent = $(this).closest('.reply').find(".reply-content");
    let editReply = $(this).closest('.reply').find(".edit-reply");
    replyContent.toggle();
    $(this).closest('.reply').find(".form-edit-reply").toggle();
    editReply.focus();
    editReply.text(reply.text());
  })
});
