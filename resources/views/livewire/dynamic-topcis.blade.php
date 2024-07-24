<div>
    
    <div class="mb-4">

        <label for="course"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Course') }}</label>
        <select id="course" wire:model.live="selectedCourse" name="course" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="0">{{ __('Select Course')}}</option>
            @foreach ($courses as $courses)
                <option value="{{ $courses->id }}" @if(isset($topic) && $topic->course_id == $courses->id) selected @endif>{{ $courses->title }}</option>
            @endforeach
        </select>
        @error('course')
            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
        @enderror

    </div>
    @if(empty($preselectDetails))
    <div class="mb-4">

        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Grade') }}</label>
        <select id="grade" name="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="0">{{ __('Select Grade')}}</option>
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}" @if(isset($topic) && $topic->program_id == $grade->id) selected @endif>{{ $grade->title }}</option>
            @endforeach
        </select>
        @error('grade')
            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
        @enderror

    </div>

    <div class="mb-4">

        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Subject') }}</label>

        <select id="subject" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="0">{{ __('Select Subject')}}</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" @if(isset($topic) && $topic->subject_id == $subject->id) selected @endif>{{ $subject->title }}</option>
            @endforeach
        </select>
        @error('subject')
            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
        @enderror

    </div>
    @else
    <input type="hidden" name="subject" value="{{$preselectDetails['subject']['id']}}">
    <input type="hidden" name="grade" value="{{$preselectDetails['grade']['id']}}">
    <div class="mb-4">
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Subject') }}</label>
        <p class="text-gray-400">{{$preselectDetails['subject']['title']}}</p>
        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Grade') }}</label>
        <p class="text-gray-400">{{$preselectDetails['grade']['title']}}</p>
    </div>
    @endif
</div>
