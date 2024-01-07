<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('quizzes.add') }}">
            @csrf

            <!-- Title -->
            <div style="margin-bottom: 15px;">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Descriptiom -->
            <div style="margin-bottom: 15px;">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Image -->
            <div style="margin-bottom: 15px;">
                <x-input-label for="image" :value="__('Image URL')" />
                <x-text-input id="image" class="block mt-1 w-full" type="text" name="image" :value="old('image')" required autofocus />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <x-primary-button style="margin-top: 20px;">
                {{ __('Create quiz') }}
            </x-primary-button>
        </form>
        </div>
    </div>
</x-app-layout>
