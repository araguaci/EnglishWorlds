$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
    $('#postStatus').submit(function(e) {

      e.preventDefault();
      var stsBody = $('#status').val();
      var dataString = "status="+stsBody;
      $.ajax({
        type: "POST",
        url: 'status',
        data: dataString,
        success: function(data){
          $('#postRequestData').append(data);
        }
      });
    });
});
