$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  $('#profileDropdown')
    .dropdown({
      on: 'hover'
    });
  // Script to auto resize TextArea
  $('textarea').autogrow({
    vertical: true,
    horizontal: false
  });
  $('#statusPostBtn').attr('disabled', true);
  $('#status').keyup(function() {
    if ($(this).val().length !== 0)
      $('#statusPostBtn').attr('disabled', false);
    else
      $('#statusPostBtn').attr('disabled', true);
  });
  $('#postStatus').submit(function(e) {
    e.preventDefault();
    var stsBody = $('#status').val();
    var dataString = "body=" + stsBody;
    $.ajax({
      type: "post",
      url: 'statuses',
      data: dataString,
      success: function(data) {
        // Create a post on the fly using the requested data
        $.get('statuses/' + data, function(data) {
          $('#status').val("");
          $('#statusPostBtn').attr('disabled', true);
          $('#nullStatuses').remove();
          $('#statusesBlock').prepend(data).fadeIn(500);
        });
      }
    });
  });
  // This is being triggered by button click, should be by form submission
  $(".reply").submit(function(e){
    e.preventDefault();
    var statusID = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: 'status/' + statusID + '/reply',
        data: {
            '_token': $('input[name=_token]').val(),
            'statusID': statusID,
            'replyBody': $('input[name=replyBody-' + statusID + ']').val()
        },
        success: function(data) {
          $('#repliesBlock' + statusID).append(data).fadeIn(500);
          $('input[name=replyBody-' + statusID + ']').val('');
        }
    });
  });
  $("body").on("click", ".deleteStatus", function(e){
    e.preventDefault();
    var statusId = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: 'status/' + statusId + '/delete',
        data: {
            'statusId': statusId
        },
        success: function(data) {
          $('#' + statusId).remove('div');
        }
    });
  });
});
