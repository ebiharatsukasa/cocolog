@section('title', $post->title)

<x-app-layout>
    <x-slot name="header">
        <h2 class="sm:text-2xl text-lg mb-2 text-fourth font-semibold">{{ $post->title }}</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 md:p-8 lg:p-12 mb-40">
        <div class="w-full space-y-5 md:space-y-12">
            <div class="text-sm font-semibold flex justify-between items-center">
                @include($post->anniversary ? 'components.likes.unlike-button' : 'components.likes.like-button')
                <p class="text-sm sm:text-base">{{ $post->created_at->isoFormat('YYYY/MM/DD(ddd)') }}</p>
            </div>
            <div class="flex justify-end space-x-4">
                <a href="{{ route('post.edit', $post) }}"
                    class="inline-flex items-center justify-center py-0 md:py-1 rounded-full border border-third font-semibold text-xs text-third hover:bg-third hover:text-white transition ease-in-out duration-300 w-12 md:w-28">
                    <i class="fa-regular fa-pen-to-square fa-xl text-sm md:mr-2 py-1 md:py-0"></i>
                    <div class="hidden md:block">
                        <p>EDIT</p>
                    </div>
                </a>
                <form method="post" action="{{ route('post.destroy', $post) }}">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('本当に削除しますか？');"
                        class="inline-flex items-center justify-center py-0 md:py-1 rounded-full border border-sixth font-semibold text-xs text-sixth hover:bg-sixth hover:text-white transition ease-in-out duration-300 w-12 md:w-28">
                        <i class="fa-regular fa-trash-can fa-xl text-sm md:mr-2 py-1 md:py-0"></i>
                        <a class="hidden md:block">
                            <p>DELETE</p>
                        </a>
                    </button>
                </form>
            </div>
            <div>
                @if ($post->image)
                    @if (app()->isLocal())
                        <img src="{{ asset('storage/images/' . $post->image) }}"
                            class="w-full mx-auto mb-2";>
                    @else
                        <img src="{{ $post->image }}" class="w-full mx-auto mb-2">
                    @endif
                @endif
                <p class="mt-4 py-4 text-third text-base md:text-lg leading-loose md:leading-loose whitespace-pre-line">
                    {{ $post->body }}
                </p>
                <hr class="w-full my-8">
                <div class="flex items-center justify-between space-x-4">
                    @if (isset($previous))
                        <a href="{{ route('post.show', $previous->id) }}" class="inline-flex items-center w-1/2">
                            <i class="fa-solid fa-chevron-left fa-md py-1 md:py-0 mr-4 text-third"></i>
                            <div class="flex flex-col">
                                <p class="text-xs text-gray-500 mb-1">前の日記</p>
                                <p class="text-sm md:text-base font-semibold">{{ $previous->title }}</p>
                            </div>
                        </a>
                    @endif
                    @if (isset($next))
                        <a href="{{ route('post.show', $next->id) }}"
                            class="inline-flex ml-auto items-center w-1/2 text-end justify-end">
                            <div class="flex flex-col">
                                <p class="text-xs text-gray-500 mb-1">次の日記</p>
                                <p class="text-sm md:text-base font-semibold">{{ $next->title }}</p>
                            </div>
                            <i class="fa-solid fa-chevron-right fa-md py-1 md:py-0 ml-4 text-third"></i>
                        </a>
                    @endif
                </div>
                <hr class="w-full my-8">
                <div class="mt-20">
                    <div class="text-end text-xs sm:text-sm">
                        <div class="flex justify-end text-third items-center">
                            <p class="mr-2 sm:mr-4">感情のマグニチュード</p>
                            <a href="{{ route('chart') }}"
                                class="text-end text-base sm:text-lg bg-seventh rounded-full border border-fifth text-black hover:shadow-lg hover:scale-105 transition ease-in-out duration-300 w-28 flex items-center justify-center">{{ $post->magnitude }}</a>
                        </div>
                        @include('components.chart/magnitude-tooltip')
                    </div>
                    <div class="text-end text-xs sm:text-sm mt-12 sm:mt-16">
                        <p class="text-end"></p>
                        <div class="flex justify-end text-third items-center">
                            <p class="mr-2 sm:mr-4">感情のクオリティ</p>
                            @if ($post->score == 5)
                                <a href="/chart#score_chart" class="text-end text-base sm:text-lg rounded-full border border-fourth hover:shadow-lg hover:scale-105 transition ease-in-out duration-300 w-28 flex items-center justify-center">0</a>
                            @elseif($post->score > 0)
                                <a href="/chart#score_chart" class="text-end text-base sm:text-lg bg-fifth rounded-full border border-seventh text-white hover:shadow-lg hover:scale-105 transition ease-in-out duration-300 w-28 flex items-center justify-center">{{ $post->score / 10 }}</a>
                            @else
                                <a href="/chart#score_chart" class="text-end text-base sm:text-lg bg-sixth rounded-full border border-seventh text-white hover:shadow-lg hover:scale-105 transition ease-in-out duration-300 w-28 flex items-center justify-center">{{ $post->score / 10 }}</a>
                            @endif
                        </div>
                        @include('components.chart/score-tooltip')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ asset('/js/chartDescription.js') }}"></script>
