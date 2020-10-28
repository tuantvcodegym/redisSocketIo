<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="data">
        @foreach($data as $item)
            <p><strong>Name: {{$item->author}}</strong>: {{$item->content}}</p>
        @endforeach
    </div>
    <div>
        <form action="send" method="post">
            @csrf
            Name: <input type="text" name="author">
            <br>
            Content: <textarea id="" cols="30" rows="10" name="content"></textarea>
            <button type="submit" name="send">Send</button>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.js"></script>
<script>
    let socket = io('http://127.0.0.1:6001')
    socket.on('laravel_database_chat:message', function (data) {
        console.log(data)
        $('#data').append('<p><strong>'+ data.author + '</strong>: '+ data.content +'</p>')
    })
</script>
</html>
