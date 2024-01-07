<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Quiz: {{$quiz->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="quiz">
                <img src="{{ $quiz->image }}" alt="quiz image"/>
                <h2>{{ $quiz->title }}</h2>
                <p>{{ $quiz->description }}</p>
                <span><b>Author:</b> {{ $author_name }}</span>
                <form>
                    <x-primary-button>Start quiz</x-primary-button>
                <form>
            </div>
        </div>
    </div>
</x-app-layout>
