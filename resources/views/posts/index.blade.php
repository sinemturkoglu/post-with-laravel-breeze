<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">My Posts</h1>
                        <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                         New Post Add
                        </a>
                    </div>

                 
                    @if ($posts->isEmpty())
                        <p>Henüz bir makale oluşturmadınız.</p>
                    @else
                        @foreach ($posts as $post)
                            <div class="mb-4 p-4 border rounded-lg shadow-sm">
                               
                                <div class="flex items-center mt-2">
                                    <p class="text-gray-600">Create Date: {{ $post->created_at->format('d/m/Y') }}</p>
                                   <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.035 21H7.965a2 2 0 01-1.998-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                                <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                                <p class="mt-2 text-gray-800">{{ Str::limit($post->content, 200) }}</p>

                                {{-- Detay, Düzenle ve Sil butonlarını daha sonra ekleyebilirsiniz --}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>