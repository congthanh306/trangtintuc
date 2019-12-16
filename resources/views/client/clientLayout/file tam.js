//Notifycation button X
$(document).ready(function() {
  $('.close').click(function(){
    $(this).parent().remove();
  });
});

//Comment function in detail page
$('#submitComment').submit(function(e) {
  /* Act on the event */
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: '/client/comment',
    dataType: 'JSON',
    data: 
    $('#submitComment').serialize()
  })
  .done(function() {

  })
  .fail(function() {
     // console.log("error");
   }) 
  .always(function(res) {
   window.location.reload();

 });
});

$('.deleteBtn').click(function(event) {
  /* Act on the event */
  var id = $(this).data("href");
  var objDelete = $(this).parent().parent();
  var msg = confirm('Are you sure you want to delete this comment?');
  if(msg)
  { 
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/client/destroycomment/'+id,
    type: 'POST',
    dataType: 'json',
  })
    .done(function() {
      objDelete.remove();
      $('#usernameCommentTime').remove();
    })
    .fail(function(res) {
     console.log("error");
   })
    .always(function() {
    });
  }
});

$('.editBtn').click(function(event) {
  /* Act on the event */
  $(this).parent().parent().parent().prop('hidden',true);
  $(this).parent().parent().parent().next().prop('hidden',false);
});

$('.saveEditComment').on('click', function(e){
  /* Act on the event */
  e.preventDefault();
  var valueEdit = $(this).parent().find('textarea.content').val();
  var idnew = $(this).parent().find('input.idNews').val();
  var idcomment = $(this).parent().find('input.idComments').val();
  
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: "POST",
    url: "/client/editcomment",
    dataType: "json",
    data: {
      content : valueEdit,
      idcomment : idcomment
    },
    success: function(response) {
     window.location.reload();
   },  
   error: function(data) {
   }
 });
});

