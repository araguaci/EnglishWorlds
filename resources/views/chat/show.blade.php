<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Chat</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="/js/jquery.min.js"></script>
        <script src="/js/chat.js" ></script>
        <style media="screen">
        .main {
            font-family: sans-serif;
            width: 60vw;
            margin: 0 auto;
        }
        .chat {
            border: 1px solid rgb(167, 206, 242);
            max-height: 65vh;
            overflow-y: scroll;
        }
        .message {
            min-height: 30px;
        }
        .message p {
            color: white;
            border-radius: 5px;
            padding: 5px;
        }
        .sender {
            float: right;
            background-color: rgb(95, 157, 228);
            margin: 0px 20px 0px 0px;
        }
        .reciever {
            float: left;
            background-color: rgb(250, 81, 62);
            margin: 0px 0px 0px 20px;
        }
        textarea {
            margin: 10px auto;
            display: block;
            width: 100%;
            font-size: 120%;
        }
        button {
            display: block;
            border: none;
            background: rgb(9, 208, 164);
            border-radius: 5px;
            color: white;
            margin: 10px auto;
            padding: 10px;
        }
        button:hover {
            cursor: pointer;
        }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="chat">
                @foreach ($data as $key)
                    @if ($key->sender_id == Auth::user()->id)
                        <div class="message"><p class="sender">{{$key->message}}</p></div>
                    @elseif ($key->reciever_id == Auth::user()->id)
                        <div class="message"><p class="reciever">{{$key->message}}</p></div>
                    @endif
                @endforeach
            </div>
            <div class="form">
                <textarea name="message" rows="8" cols="80" id='message'></textarea>
                <button id='send' type="button" name="button" value="{{$correspondent}}">Send</button>
            </div>
        </div>
    </body>
</html>
