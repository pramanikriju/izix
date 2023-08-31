@extends('layouts.layout')

@section('content')
    <div class="flex justify-center flex-col dark:text-gray-200 my-2">
        <h1 class="text-2xl">{{ $article->title }}</h1>
        <h1 class="text-lg italic my-2">{{ $article->user->name }}</h1>
        <h1 class="text-sm italic">{{ $article->created_at->diffForhumans() }}</h1>
        <div class="py-8 prose  dark:text-gray-400">
            {{ $article->content }}
        </div>
        <hr>
        <div class="prose">
            <h3 class="text-lg dark:text-gray-400 my-4">Comments</h3>
            <livewire:comment-box :article="$article"/>
        </div>
    </div>
@endsection
