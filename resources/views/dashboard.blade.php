<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="font-sans">
                <div class="bg-white max-w-md mx-auto my-3 border border-grey-light rounded-t-lg overflow-hidden">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            Quoi de neuf ?
                        </div>
                    </div>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" class="" action="{{ route('posts') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="bg-grey-lighter p-4 pl-8">
                            <textarea
                                id="body"
                                name="body"
                                class="w-full border border-blue rounded"
                                ></textarea>

                            @error('body')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message     }}
                                </p>
                            @enderror
                            <div class="flex justify-between items-center mt-2">
                                   <img
                                       src=" {{ url("imgs/".Auth::user()->photo) }}"
                                       alt="photo-profil"
                                       class="rounded-full mr-2"
                                       style="width: 45px; height: 45px"
                                   >
                                <button
                                    type="submit"
                                    class="
                                    py-2 px-4 bg-white border
                                    border-blue rounded rounded-full
                                    hover:bg-blue hover:text-white">
                                    Publier
                                </button>
                            </div>

                            </div>
                    </form>
                    <hr>
                    <!-- POSTS -->
                    @foreach($posts as $post)
                        @include('post')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

