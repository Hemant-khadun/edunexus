<div>
    @if($existingTopics)
    <div class="mb-4">
        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Grade') }}</label>

        @if(isset($course) || isset($courseWrapper) || ($existingTopics))
        <input type="hidden" name="grade" value="@if(isset($courseWrapper)){{$courseWrapper->program->id}}@elseif($existingTopics){{$selectedGrade}}@else{{$course->program_id}}@endif">
            @foreach ($grades as $grade)

                @if( isset($course) && $course->program_id == $grade->id)
                    <span class="text-gray-700 dark:text-gray-400">{{ $grade->title }}</span>
                @elseif((isset($courseWrapper) && $courseWrapper->program->id == $grade->id) || (($existingTopics) && $grade->id == $selectedGrade) )
                    <span class="text-gray-700 dark:text-gray-400">{{ $grade->title }}</span>
                @endif

            @endforeach
        @else

        <select id="grade" wire:model.live="selectedGrade" name="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="0">{{ __('Select Grade')}}</option>
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}" @if(isset($course) && $course->program_id == $grade->id) selected @endif>{{ $grade->title }}</option>
            @endforeach
        </select>
        @endif
        @error('grade')
            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
        @enderror

    </div>

    <div class="mb-4">
        <label for="topic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Topic') }}</label>
        <select id="topic" @if(isset($course)) wire:model.live="selectedTopic" @endif name="topic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="0">{{ __('Select Topic')}}</option>
            @foreach ($topics as $topic)
                <option value="{{ $topic->id }}" @if(isset($course) && $course->topic_id == $topic->id) selected @endif>{{ $topic->name }}</option>
            @endforeach
        </select>
        @error('topic')
            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
        @enderror
    </div>

 
    <div class="mb-4">
        <label for="Subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Subject') }}</label>
        @if(isset($course) || isset($courseWrapper) || ($existingTopics) )
       
        <input type="hidden" name="subject" value="@if(isset($courseWrapper)){{$courseWrapper->subject->id}}@elseif(($existingTopics)){{$subjects[0]['id']}}@else{{$course->subject_id}}@endif">
            @foreach ($subjects as $subject)
                @if( isset($course) && $course->subject_id == $subject->subject->id)
                    <span class="text-gray-700 dark:text-gray-400">{{ $subject->subject->title }}</span>
                @elseif((isset($courseWrapper) && $courseWrapper->subject->id == $subject['id'] ) || ($existingTopics))
                    <span class="text-gray-700 dark:text-gray-400">{{ $subject['title'] }}</span>
                @endif
                
            @endforeach
        @else
            <select id="Subject" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="0">{{ __('Select Subject')}}</option>
                @foreach ($subjects as $subject)
                    <option value="@if(isset($subject->subject->id)) {{ $subject->subject->id }} @endif" @if(isset($course) && $course->subject_id == $subject->subject->id) selected @endif>@if(isset($subject->subject->title)) {{ $subject->subject->title }} @endif</option>
                @endforeach
            </select>
            @endif
            @error('subject')
                <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
            @enderror
    </div>
    @else
    <div class="py-3 flex flex-col gap-3">
        <p class="text-xl text-gray-400 dark:text-white">Please add a topic to your course </p>
        <a href="{{route('topic.create')}}" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add a topic</a>
    </div>
    @endif
</div>