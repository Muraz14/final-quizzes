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
                <p style="color: red;">@if($not_startable) No question to start the quiz @endif</p>
                <a href="{{ route('test', ['quiz_id' => $quiz->id, 'question' => 1]) }}" id="startQuizLink">
                    <x-primary-button :disabled="$not_startable">Start quiz</x-primary-button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const startQuizLink = document.querySelector('#startQuizLink');

    startQuizLink.addEventListener('click', () => {
        localStorage.setItem('score', '0');
        localStorage.setItem('quesitons_count', '{{ $quesitons_count }}');
    });
</script>
