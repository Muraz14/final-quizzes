<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="display: flex; align-items: center; justify-content: space-between; padding-right: 30px;">
                <div class="p-6 text-gray-900" style="font-size: 28px;" id="testFinishScore">
                    -
                </div>
                <a href="{{ route('quizzes') }}">
                    <x-primary-button>Home</x-primary-button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const score = localStorage.getItem('score') || 0;
    const quesitons_count = localStorage.getItem('quesitons_count') || 0;

    const testFinishScore = document.querySelector('#testFinishScore');
    
    testFinishScore.innerHTML = `Your score - <b>${score}/${quesitons_count}</b>`;

    localStorage.removeItem('score');
    localStorage.removeItem('quesitons_count');
</script>
