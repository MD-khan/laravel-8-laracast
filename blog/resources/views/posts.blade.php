<x-layout>
    <!-- Header -->
    @include('_posts-header')
    <!-- End Header -->


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <!-- feature article -->
        <x-post-feature-card />
        <!--./End feature article-->

        <div class="lg:grid lg:grid-cols-2">
            <x-post-card />
            <x-post-card />
        </div> <!-- ./lg:grid-cols-2 -->

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div>
        <!--./ lg:grid-cols-3 -->


    </main>



    @foreach ($posts as $post)
    <!-- dynamicly adding class to the even-->
    <article class="{{ $loop->even ? 'article': ''}}">

        <h1>
            <a href="/posts/{{$post->slug }}">
                {{$post->title }}
            </a>
        </h1>
        <p>
            By <a href="/authors/{{ $post->author->username }}"> {{ $post->author->name }} </a>
            in <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }} </a>
        </p>

        <p>
            <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }} </a>
        </p>

        <div>
            {{$post->excerpt }}
        </div>


    </article>

    @endforeach

</x-layout>