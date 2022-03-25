<x-layout>
    <!-- Header -->
    @include('_posts-header')
    <!-- End Header -->


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
        <x-posts-grid :posts="$posts" />
        @endif



    </main>
</x-layout>