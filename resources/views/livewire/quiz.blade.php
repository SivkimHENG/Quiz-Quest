
<div class="bg-gray-100 h-screen flex flex-col items-center justify-center p-6">

    <!-- Question -->
    <div class="bg-white w-full max-w-4xl p-6 mt-4 rounded-lg shadow">
        <h2 class="text-xl font-bold text-center">{{ $question }}</h2>
        <div class="mt-4">
        </div>
    </div>

    <!-- Options -->
    <div class="grid grid-cols-2 gap-4 mt-6 w-full max-w-4xl">
        @foreach ($options as $index => $option)
            <button
                wire:click="selectOption({{ $index }})"
                class="p-4 rounded-lg shadow text-white text-lg font-bold
                {{ $selectedOption === $index
                    ? ($index === $correctOption ? 'bg-green-500' : 'bg-red-500')
                    : 'bg-blue-500 hover:bg-blue-600' }}"
            >
                {{ $option }}
            </button>
        @endforeach
    </div>

    <!-- Feedback -->
    @if ($feedback)
        <div class="bg-white mt-6 w-full max-w-4xl p-4 rounded-lg shadow text-center">
            <p class="text-lg font-bold">{{ $feedback }}</p>
        </div>
    @endif

    <!-- Next Button -->
    @if ($feedback) <!-- Show Next Button only after feedback is given -->
        <button
            wire:click="nextQuestion"
            class="bg-green-500 text-white px-6 py-2 mt-4 rounded-lg hover:bg-green-600"
        >
            Next Question
        </button>
    @endif
</div>
