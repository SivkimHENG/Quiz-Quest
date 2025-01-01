<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    @if ($currentQuestionIndex < $totalQuestions)
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800">
                Question {{ $currentQuestionIndex + 1 }}:
            </h2>
            <p class="text-gray-600">{{ $questions[$currentQuestionIndex]->question }}</p>
        </div>

        <div class="space-y-4">
            @foreach ($questions[$currentQuestionIndex]->answers as $answer)
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input
                        type="radio"
                        wire:model="selectedAnswer"
                        value="{{ $answer->id }}"
                        class="h-5 w-5 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                    >
                    <span class="text-gray-700">{{ $answer->answer }}</span>
                </label>
            @endforeach
        </div>

        @if ($feedback)
            <div class="mt-4">
                <p class="{{ $feedback === 'Correct! Great job.' ? 'text-green-500' : 'text-red-500' }}">
                    {{ $feedback }}
                </p>
            </div>
        @endif

        <button
            wire:click="submitAnswer"
            wire:loading.attr="disabled"
            class="mt-6 px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition duration-200"
        >
            Submit Answer
        </button>
    @else
        <div class="text-center">
            <h2 class="text-2xl font-semibold text-gray-800">Quiz Completed!</h2>
            <p class="text-gray-600 mt-2">Your Final Score: {{ $score }}/{{ $totalQuestions }}</p>
            <button
                wire:click="mount"
                class="mt-4 px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition duration-200"
            >
                Retry Quiz
            </button>
        </div>
    @endif

    <!-- Progress Bar -->
    <div class="mt-6 w-full bg-gray-200 h-2 rounded-full">
        <div
            class="bg-indigo-600 h-2 rounded-full transition-all duration-300"
            style="width: {{ ($currentQuestionIndex / $totalQuestions) * 100 }}%"
        ></div>
    </div>
</div>
