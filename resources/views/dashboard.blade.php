<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center py-8">
                    <div class="border px-16 py-10 flex flex-col justify-center">
                        <span class="text-6xl text-blue-500 font-bold mx-auto">
                            {{$publishedComments->total()}}
                        </span>
                        <span class="mx-auto">Published</span>
                    </div>
                    <div class="border px-16 py-10 flex flex-col justify-center">
                        <span class="text-6xl text-blue-500 font-bold mx-auto">
                            {{$unpublishedComments->total()}}
                        </span>
                        <span class="mx-auto">Unpublished</span>
                    </div>

                </div>
                <div class="p-6 text-gray-900">
                    <table class="w-full border-spacing-4  border-blue-500 text-sm text-left text-gray-500 ">
                        <caption class="caption-top pb-6 ">
                            Table 1: Unpublished comments
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Article name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Timestamp
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($unpublishedComments as $comment)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <a href="{{route('view.article',['article' => $comment->article ])}}" class="hover:underline hover:text-blue-500">
                                    {{$comment->article->title}}
                                    </a>
                                </th>
                                <td class="px-6 py-4">
                                    {{$comment->content}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$comment->user_id ? $comment->user->name : 'Anonymous'}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$comment->created_at}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <p class="my-4">
                        {{ $unpublishedComments->links() }}

                    </p>
                </div>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="p-6 text-gray-900">
                    <table class="w-full border-spacing-4  border-blue-500 text-sm text-left text-gray-500 ">
                        <caption class="caption-top pb-6 ">
                            Table 2: Published comments
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Article name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Timestamp
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($publishedComments as $comment)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <a href="{{route('view.article',['article' => $comment->article ])}}" class="hover:underline hover:text-blue-500">
                                        {{$comment->article->title}}
                                    </a>
                                </th>
                                <td class="px-6 py-4">
                                    {{$comment->content}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$comment->user_id ? $comment->user->name : 'Anonymous'}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$comment->created_at}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <p class="my-4">
                        {{ $publishedComments->links() }}

                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
