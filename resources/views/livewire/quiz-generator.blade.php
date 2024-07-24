<div>
    <h2 class="text-xl font-semibold mb-4 dark:text-white">{{ __('Create Your Quiz') }}</h2>
    @if($questions)
        @foreach ($questions as $index => $question)
            <div class="mb-4 pb-5 border-b border-blue-300">
                <label for="question{{ $index }}" class="block font-medium dark:text-white mb-2">{{ __('Question') }} {{ $index + 1 }} </label>
                <input type="text" wire:model="questions.{{ $index }}.question" id="question{{ $index }}" name="quiz_questions[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                <div class="mt-2 flex flex-col">
                        @foreach ($question['answers'] as $answerIndex => $answer)
                            <label class="block font-medium dark:text-white mb-2">{{ __('Answers') }} {{ $answerIndex + 1 }}</label>
                            <div class="flex flex-row gap-3 align-middle items-center">
                                <input type="text" wire:model="questions.{{ $index }}.answers.{{ $answerIndex }}"  name="quiz_answers[{{ $index }}][]" class="wbg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                
                                    <div class="inline-flex items-center">
                                        <label
                                            class="relative flex cursor-pointer items-center rounded-full p-3"
                                            for="checkbox"
                                            data-ripple-dark="true"
                                        >
                                            <input
                                                {{-- wire:model="questions.{{ $index }}.is_good.{{ $answerIndex }}" --}}
                                                type="radio"
                                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                id="checkbox"
                                                name="good_answer[{{$index}}]"
                                                @if(isset($goodAnswers[$index][$answerIndex]) && $goodAnswers[$index][$answerIndex])
                                                    checked
                                                @endif
                                                @if(isset($goodAnswers[$index]['good_answers'][$answerIndex]) && $goodAnswers[$index]['good_answers'][$answerIndex])
                                                    value="{{$answerIndex}}"
                                                @endif
                                            />

                                            <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3.5 w-3.5"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                stroke="currentColor"
                                                stroke-width="1"
                                            >
                                                <path
                                                fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                            </div>
                                        </label>
                                        </div>

                                <a type="button" wire:click="removeAnswer({{ $index }}, {{ $answerIndex }})" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </a>

                            </div>
                        @endforeach
                    <a wire:click="addAnswer({{ $index }})" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-6 w-2/4">Add Answer</a>
                </div>
            </div>
        @endforeach
    @endif
    <a wire:click="addQuestion" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Question</a>
</div>
