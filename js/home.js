$('#CommentForm').submit(function() {
  return false;
});

$('#PostComment').click(function(){
  $.post(
   $('#CommentForm').attr('action'),
   $('#CommentForm :input').serializeArray(),
   function(result){
   $('#result').html(result);
   }
   );
});
