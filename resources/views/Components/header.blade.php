<header class="group flex items-center gap-2 border-b-2 border-gray-100 bg-gradient-to-b from-gray-50 to-yellow-50 p-4">
    <h1 class="">
        <a href="/" class="group flex items-center">
            <span>BROK</span>
            <span>+</span>
            <span>N</span>
        </a>
    </h1>
    <a class="transition-color text-6xl duration-500 group-hover:text-orange-600">/</a>
    <h2 class="text-md">{{ $heading }}</h2>
    <nav class="al ml-auto flex items-center gap-2">
        <x-nav.link href="/root" class="{{ request()->routeIs('root') ? 'active' : '' }}">root</x-nav.link>
        <x-nav.link href="/bio" class="{{ request()->is('bio') ? 'active' : '' }}">bio</x-nav.link>
        <x-nav.link href="/work" class="{{ request()->routeIs('work*') ? 'active' : '' }}">work</x-nav.link>
        <div class="flex">
            <a href="/for-your-eyes-only">
                <img
                    class="block h-[40px] w-[40px] hover:cursor-pointer"
                    src="https://source.boringavatars.com/bauhaus/40/broken-hearts-but-not-ideas" />
            </a>
            <ul class="ml-4 hidden items-center text-sm xl:flex">
                <li class="border-l-2 border-red-600 px-4">tommy spinelli</li>
                <li class="border-l-2 border-red-600 pl-4">exit</li>
            </ul>
        </div>
    </nav>
</header>
