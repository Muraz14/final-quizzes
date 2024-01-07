<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('quizzes.update', ['id' => $quiz->id]) }}">
                @csrf
                @method('patch')

                <!-- Title -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$quiz->title" required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Descriptiom -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$quiz->description" required autofocus />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Image -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="image" :value="__('Image URL')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="text" name="image" :value="$quiz->image" required autofocus />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <x-primary-button style="margin-top: 20px;">
                    {{ __('Update quiz') }}
                </x-primary-button>
            </form>

            <div style="margin-top: 40px;">
                @foreach ($questions as $question)
                    <div class="question">
                        <h2>{{ $loop->index + 1 }}. {{ $question->question }}</h2>
                        <form method="POST" action="{{ route('question.delete', ['id' => $question->id]) }}"> 
                            @csrf
                            @method('delete')

                            <x-primary-button style="margin-top: 20px;">
                                {{ __('Delete question') }}
                            </x-primary-button>
                        </form>
                    </div>
                @endforeach
            </div>

            <form method="POST" action="{{ route('question.create', ['quiz_id' => $quiz->id]) }}" style="margin-top: 20px;">
                @csrf
                @method('post')

                <!-- Question -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="question" :value="__('Question')" />
                    <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question')" required autofocus />
                    <x-input-error :messages="$errors->get('question')" class="mt-2" />
                </div>

                <!-- Image -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="image" :value="__('Image URL')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="text" name="image" :value="old('image')" required autofocus />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <!-- Answer1 -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="answer1" :value="__('Answer1')" />
                    <x-text-input id="answer1" class="block mt-1 w-full" type="text" name="answer1" :value="old('answer1')" required autofocus />
                    <x-input-error :messages="$errors->get('answer1')" class="mt-2" />
                </div>

                <!-- Answer2 -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="answer2" :value="__('Answer2')" />
                    <x-text-input id="answer2" class="block mt-1 w-full" type="text" name="answer2" :value="old('answer2')" required autofocus />
                    <x-input-error :messages="$errors->get('answer2')" class="mt-2" />
                </div>

                <!-- Answer3 -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="answer3" :value="__('Answer3')" />
                    <x-text-input id="answer3" class="block mt-1 w-full" type="text" name="answer3" :value="old('answer3')" required autofocus />
                    <x-input-error :messages="$errors->get('answer3')" class="mt-2" />
                </div>

                <!-- Answer4 -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="answer4" :value="__('Answer4')" />
                    <x-text-input id="answer4" class="block mt-1 w-full" type="text" name="answer4" :value="old('answer4')" required autofocus />
                    <x-input-error :messages="$errors->get('answer4')" class="mt-2" />
                </div>

                <!-- Correct answer -->
                <div style="margin-bottom: 15px;">
                    <x-input-label for="correct_answer" :value="__('Correct answer')" />
                    <x-text-input id="correct_answer" class="block mt-1 w-full" type="text" name="correct_answer" :value="old('correct_answer')" required autofocus />
                    <x-input-error :messages="$errors->get('correct_answer')" class="mt-2" />
                </div>

                <x-primary-button style="margin-top: 20px;">
                    {{ __('Add question') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
