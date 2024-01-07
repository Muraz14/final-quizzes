<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My quizzes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($my_quizzes as $quiz)
            <a href="{{ route('quizzes.quiz', ['id' => $quiz->id]) }}">
                <div class="card">
                    <img src="{{ $quiz->image }}" alt="Card Image" class="card-image">
                    <div class="card-content">
                        <h3 class="card-title">{{ $quiz->title }}</h3>
                        <p class="card-description">{{ $quiz->description }}</p>
                    </div>
                    <div class="card-buttons">
                        <x-primary-button>Edit</x-primary-button>
                        
                        <form action="{{ route('quizzes.remove', ['id' => $quiz->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <x-primary-button>Remove</x-primary-button>
                        </form>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
