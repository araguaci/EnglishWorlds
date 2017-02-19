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
$(document).ready(function() {
    // TODO: Work on task N° 15
    $(window).onload(function InfiniteScrolling() {
        var height = document.getElementsByTagName('')
    })
})
