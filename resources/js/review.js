$(document).ready(function () {
  $('.js-btn-review').on('click', function (e) {
    $(this).closest('.comment').find(".reply").focus();;
  });

  $('.js-btn-reply').on('click', function (e) {
    $(this).closest('.reply').find(".reply").focus();;
  });

  $('.js-btn-edit-review').on('click', function (e) {
    let commentContent = $(this).closest('.comment').find(".comment-content");
    let editComment = $(this).closest('.comment').find(".edit-comment");
    commentContent.toggle();
    $(this).closest('.comment').find(".form-edit-comment").toggle();
    editComment.focus();
    editComment.text(commentContent.text());
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