<div>
    <div>
        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white sr-only">Comment</label>
        <input type="text" id="comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="Enter your comment here" required  wire:model.live="text" name="comment" />
        <div class="text-red-600">@error('text') {{ $message }} @enderror</div>
        <div class="my-2">
            <button type="button" wire:click="save"
                    class="text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" />
                </svg>
                Post
            </button>
            <button type="button" wire:click="delete"
                    class="focus:outline-none inline-flex  text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                </svg>
                Delete
            </button>
        </div>
    </div>

    <div class="my-2">
        @foreach ($comments as $comment)
            <div class="rounded-md dark:text-gray-400 px-4 border border-sky-500 my-2" wire:key="{{ $comment->id }}">
                <div class="flex flex-col">
                    <p class="flex justify-between py-0">
                                               <span class="font-bold">
                                                   {{$comment->user_id ? $comment->user->name : 'Anonymous'}}
                                               </span>
                        <span>
                                                    {{$comment->created_at->diffForHumans()}}
                                                </span>
                    </p>
                    <p class="py-0 mt-0">
                        {{$comment->content}}
                    </p>
                </div>

            </div>

        @endforeach
    </div>
</div>
