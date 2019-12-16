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

$('.saveEditComment').click(function(event) {
 /* Act on the event */

 var idcomment = $(this).parent().find('input.idComment').val();
 var valueEdit = $(this).parent().find('textarea.content').val();
 var idNews = $(this).parent().find('input.idNews').val();
 console.log(idNews);
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
 $.ajax({
  url: '/client/editcomment/'+ idcomment,
  type: 'POST',
  dataType: 'JSON',
  data:   {
    content: valueEdit,
    id:idcomment,
    idNews: idNews
  }
})
 .done(function() {
    // console.log("success");
  })
 .fail(function() {
    // console.log("error");
  })
 .always(function(res) {
  console.log(res);
    window.location.reload();
  });
});
