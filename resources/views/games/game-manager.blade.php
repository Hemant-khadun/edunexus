<x-home-layout>
    <section id="game" class="pt-10 overflow-hidden bg-gray-50 dark:bg-gray-900 md:pt-0 sm:pt-16 2xl:pt-16">
        <div class="flex justify-center">
            <div class="container-game">
                <div class="dots-game"><span></span><span></span><span></span><span></span><span></span><span></span></div>
                <div class="content-game">
                    @if($game == 'fn')
                    <iframe src="{{ asset('games\fomula-numbers\index.html') }}" frameborder="0"></iframe>
                    @elseif($game == 'gp')
                    <iframe src="{{ asset('games\geometry-pals\index.html') }}" frameborder="0"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-home-layout>