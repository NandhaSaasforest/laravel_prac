<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Routing</title>
</head>
<body>
    <div class="post">
        <h1>{{ $post->title }}</h1>
        <div class="content">
            {!! $post->content !!}
        </div>
    </div>
</body>
</html>