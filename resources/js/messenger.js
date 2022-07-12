$('.message-btn').on('click',function (){
  $('#message').toggleClass('active');
})

$('#jqueryBtn').on('click',function (){
  $('#cancel').toggleClass('active');
  $('#jqueryBtn').toggleClass('active');
})