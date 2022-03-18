<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
    <title>Document</title>
</head>

<body>
    @foreach ($posts as $post)
    <!-- dynamicly adding class to the even-->
    <article class="{{ $loop->even ? 'article': ''}}">

        <h1> <a href="/posts/{{$post->slug }}">{{$post->title }} </a> </h1>

        <div>
            {{$post->excerpt }}
        </div>
    </article>
    @endforeach;


</body>

</html>