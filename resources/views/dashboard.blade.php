<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Public quizzes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($quizzes as $quiz)
            <a href="{{ route('quizzes.quiz', ['id' => $quiz->id]) }}">
                <div class="card">
                    <img src="{{ $quiz->image }}" alt="Card Image" class="card-image">
                    <div class="card-content">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 15px;">
                            <h3 class="card-title">{{ $quiz->title }}</h3>
                            <p><b>Questions:</b> {{ $quiz->total_questions }}</p>
                        </div>
                        <p class="card-description">{{ $quiz->description }}</p>
                    </div>
                </div>
            </a>
            @empty
            <p>No items found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
