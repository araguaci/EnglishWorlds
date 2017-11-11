new Vue({
  el: '#app-wrapper',
  data: {
    is_enabled : true,
    status: '',
  },
  methods: {
    enable() {
      if (this.status.length <= 0) {
        this.is_enabled = true;
        return;
      }
      this.is_enabled = false;
    }
  }
});

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
    console.log("hhahaha");
    e.preventDefault();
    var status_id = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: 'status/' + status_id + '/comment',
        data: {
            '_token': $('input[name=_token]').val(),
            'status_id': status_id,
            'replyBody': $('input[name=replyBody-' + status_id + ']').val()
        },
        success: function(data) {
          $('#repliesBlock' + status_id).append(data).fadeIn(500);
          $('input[name=replyBody-' + status_id + ']').val('');
        }
    });
  });
  $("body").on("click", ".deleteStatus", function(e){
    e.preventDefault();
    var status_id = $(this).data('id');
    $.ajax({
        type: 'get',
        url: 'statuses/' + status_id,
        data: {
            'status_id': status_id
        },
        success: function(data) {
          $('#' + status_id).remove('div');
        }
    });
  });
});
