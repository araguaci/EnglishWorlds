$(document).ready(function() {
    $('#send').click(function() {
        sendMessage();
    });
    $('#message').keypress(function(e) {
    if(e.which == 13) {
        sendMessage();
    }
});
    setInterval(function() {
        update();
    }, 1000);

});

function update() {
    correspondent = $('#send').val();
    $.ajax({
        url: '/chat/update',
        type: 'get',
        data: {correspondent: correspondent}
    })
    .done(function(data) {
        for(i=0; i < data.length; i++) {
            $('.chat').append('<div class="message"><p class="reciever">'+data[i]+'</p></div>');
            scrollToLast();
            console.log('message added '+data[i]);
        }
        console.log('updated');
    })
    .fail(function() {
        console.log("error");
        alert('Sorry Unable to connect to server');
    })
    .always(function() {
        console.log("complete");
    });
}

function sendMessage() {
    message = $('#message').val();
    correspondent = $('#send').val();
    $.ajax({
        url: '/chat/send',
        type: 'get',
        data: {message: message, correspondent: correspondent}
    })
    .done(function() {
        $('.chat').append('<div class="message"><p class="sender">'+message+'</p></div>')
        scrollToLast();
        $('#message').val('');
    })
    .fail(function() {
        console.log("error");
        alert('Sorry your message was not sent');
    })
    .always(function() {
        console.log("complete");
    });
}

function scrollToLast() {
    $(".chat").animate({
        scrollTop: $('.chat')[0].scrollHeight - $('.chat')[0].clientHeight
    }, 1000);
}
