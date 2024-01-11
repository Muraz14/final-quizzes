<style>
.quiz-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

.question img {
    width: 450px;
    height: 300px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
}

.question p {
    font-size: 18px;
    margin-bottom: 20px;
}

.answers {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.answer-option {
    display: block;
    margin-bottom: 10px;
}

.submit-button {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

.submit-button:hover {
    background-color: #45a049;
}

.correct {
    background-color: #9bd79b;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.incorrect {
    background-color: #f1a9a9;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.question-number {
    margin: 10px;
    font-size: 28px;
    align-self: flex-end;
    text-align: right;
}
</style>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="quiz-container">
                <div class="question">
                    <img src="{{ $curr_question->image }}" alt="Question Image">
                    <p>{{ $curr_question->question }}</p>
                </div>

                <p class="question-number">{{ $question_num }}/{{ $questions_count }}</p>

                <p id="testAnswerText"></p>
                <form class="answers" id="testAswersForm">
                    <label class="answer-option">
                        <input type="radio" name="answer" value="{{ $curr_question->answer_1 }}">
                        {{ $curr_question->answer_1 }}
                    </label>

                    <label class="answer-option">
                        <input type="radio" name="answer" value="{{ $curr_question->answer_2 }}">
                        {{ $curr_question->answer_2 }}
                    </label>

                    <label class="answer-option">
                        <input type="radio" name="answer" value="{{ $curr_question->answer_3 }}">
                        {{ $curr_question->answer_3 }}
                    </label>

                    <label class="answer-option">
                        <input type="radio" name="answer" value="{{ $curr_question->answer_4 }}">
                        {{ $curr_question->answer_4 }}
                    </label>
                    <x-primary-button id="testSubmitBtn">Submit</x-primary-button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const answersForm = document.querySelector('#testAswersForm');
    const testSubmitBtn = document.querySelector('#testSubmitBtn');
    const testAnswerText = document.querySelector('#testAnswerText');


    const storedScore = localStorage.getItem('score');

    if (!storedScore) {
        alert('Start a quiz by clicking on a start button on the quiz page!')
        window.location.replace('/');
    }

    function markupAnswer(res) {
        if (res.answer) {
            testAnswerText.classList.add('correct');
            testAnswerText.innerText = 'Answer is correct';

            localStorage.setItem('score', Number(storedScore) + 1);
        } else {
            testAnswerText.classList.add('incorrect');
            testAnswerText.innerText = `Answer is incorrect the correct answer is: ${res.correct_answer}`;
        }

        testSubmitBtn.remove();
        
        let nextBtnMarkup;

        if (Number('{{ $question_num }}') === Number({{ $questions_count }})) {
            nextBtnMarkup = `
            <a href="{{ route('test.finish') }}">
                <x-primary-button>Finish</x-primary-button>
            </a>`;
        } else {
            nextBtnMarkup = `
            <a href="/test/5?question={{ $question_num + 1 }}">
                <x-primary-button>Next</x-primary-button>
            </a>`;
        }

        answersForm.insertAdjacentHTML("afterend", nextBtnMarkup);
    }

    function disableAnswers() {
        for (let i = 0; i < answersForm.elements.length - 1; i++) {
            answersForm.elements[i].disabled = true;
        }
    }

    function checkFunction(checkedAnswer) {
        axios.post('http://localhost:8000/check-question', {
            quiz_id: '{{ $quiz_id }}',
            question: '{{ $question_num }}',
            checkedAnswer
        }).then((res) => {
            markupAnswer(res.data);
            disableAnswers();
        }).catch((err) => {
            console.log(err);
        });
    }
    
    answersForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const checkedValue = answersForm.elements['answer'].value;
        checkFunction(checkedValue);

        testSubmitBtn.disabled = true;
    });
</script>
