@extends('layouts.layout')

@section('content')
    <div class="flex justify-center prose ">
        <ul>
            @foreach ($articles as $article)
                <li class="dark:text-gray-400 my-2 "><a class="no-underline dark:text-gray-400 hover:underline hover:text-blue-500" href="{{route('view.article',['article' => $article])}}">{{ $article->title }}</a></li>
            @endforeach
        </ul>

    </div>
    <div class="mt-8">
        {{ $articles->links() }}

    </div>
@endsection
