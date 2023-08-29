@extends('layouts.layout')

@section('content')
    <div class="flex justify-center flex-col dark:text-gray-200 my-2">
                        <h1 class="text-2xl">{{ $article->title }}</h1>
                        <div class="py-8 prose  dark:text-gray-400">
                            {{ $article->content }}

                        </div>
                        <hr>
                        <div class="prose">
                            <h3 class="text-lg dark:text-gray-400 my-4">Comments</h3>
                            <ul class="list-none">
                                @foreach ($comments as $comment)
                                    <li class="rounded dark:text-gray-400 px-4 border border-sky-500">
                                        <div class="flex flex-col">
                                            <p class="flex justify-between py-0">
                                               <span class="font-bold">
                                                   {{$comment->user_id ? $comment->user->name : 'Anonymous'}}
                                               </span>
                                                <span>
                                                    {{$comment->created_at->diffForHumans()}}
                                                </span>
                                            </p>
                                            <p>
                                                {{$comment->content}}
                                            </p>
                                        </div>

                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
@endsection
