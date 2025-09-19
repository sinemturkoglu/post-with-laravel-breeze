<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($posts->isEmpty())
                        <p>Henüz bir makale oluşturmadınız.</p>
                    @else
                        @foreach ($posts as $post)
                            <div class="mb-4 p-4 border rounded-lg shadow-sm">
                                <div class="flex justify-between items-center mt-2 text-gray-600">
                                    <p>Author: {{ $post->user->name }}</p>

                                    {{-- Tarih bilgisi --}}
                                    <p>Create Date: {{ $post->created_at->format('d/m/Y') }}</p>
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
