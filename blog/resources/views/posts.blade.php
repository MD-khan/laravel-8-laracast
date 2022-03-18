<x-layout>

    @foreach ($posts as $post)

    <!-- dynamicly adding class to the even-->
    <article class="{{ $loop->even ? 'article': ''}}">

        <h1> <a href="/posts/{{$post->slug }}">{{$post->title }} </a> </h1>

        <div>
            {{$post->excerpt }}
        </div>
    </article>

    @endforeach

</x-layout>