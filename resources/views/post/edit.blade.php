<x-app-layout>
    <x-slot name="header">
        <h2 class="sm:text-3xl text-2xl mb-2 text-fourth">日記を書き直す</h2>
        <p class="w-full leading-relaxed text-gray-500">Let out everything that comes to your mind.
            Don't deny it, just overlook the feelings that are there.
            When you let it all out, your heart will feel lighter and lighter.
        </p>
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{ route('post.update', $post) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="body" class="font-semibold leading-none mt-4 mb-2">件名</label>
                        <input type="text" name="title"
                            class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title"
                            value="{{ old('title', $post->title) }}" placeholder="Enter Title">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4 mb-2">本文</label>
                    <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30"
                        rows="10">{{ old('body', $post->body) }}</textarea>
                </div>

                <div class="w-full flex flex-col">
                    @if ($post->image)
                        <img src="{{ asset('storage/images/' . $post->image) }}" class="mx-auto my-4"
                            style="height:300px;">
                    @endif
                    <label for="image" class="font-semibold leading-none mt-4 mb-2">画像 （1MBまで）</label>
                    <div>
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <x-primary-button class="mt-4">
                    送信する
                </x-primary-button>

            </form>
        </div>
    </div>

</x-app-layout>