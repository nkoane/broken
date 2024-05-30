<header class="group flex items-center gap-2 border-b-2 border-gray-100 bg-gradient-to-b from-gray-50 to-yellow-50 p-4 pr-0">
    <div class="flex items-center">
        <h1 class="">
            <a href="/" class="group flex items-center font-bold">
                <span class="text-broken">BROK</span>
                <span>+</span>
                <span>N</span>
            </a>
        </h1>
        <a class="transition-color -mt-3 ml-2 mr-2 text-6xl duration-500 group-hover:text-orange-600">/</a>
        <h2 class="text-md font-light uppercase">{{ $heading }}</h2>
    </div>
    <nav class="al ml-auto flex items-center gap-2" role="navigation">
        <x-nav.link href="/" :active="request()->routeIs('root')">root</x-nav.link>
        <x-nav.link href="/bio" :active="request()->is('bio')">bio</x-nav.link>
        <x-nav.link href="/jobs" :active="request()->routeIs('jobs*')">jobs</x-nav.link>
    </nav>

    <ul class="flex items-center bg-white p-2 text-sm">
        @auth
            <li class="mr-2 border-black border-l-black px-2">
                <x-nav.link href="/dash">dash</x-nav.link>
            </li>
            <li>
                <a href="/for-your-eyes-only">
                    <img
                        class="block h-[40px] w-[40px] hover:cursor-pointer"
                        src="https://source.boringavatars.com/bauhaus/40/broken-hearts-but-not-ideas"
                        alt="tommy spinelli"
                    />
                </a>
            </li>
            <li class="ml-2 border-l-2 border-black px-2">
                <x-nav.link
                    action="/sign-out"
                    method="post"
                    type="button"
                    class="rounded border bg-gray-100 px-2 py-1 text-blue-600 hover:bg-black hover:text-white active:outline"
                >
                    sign out
                </x-nav.link>
            </li>
        @endauth

        @guest
            <li class="ml-2 border-l-2 border-black px-2">
                <x-nav.link href="/sign-in" :active="request()->routeIs('login')">sign in</x-nav.link>
                <x-nav.link href="/sign-up" :active="request()->routeIs('register.create')">sign up</x-nav.link>
            </li>
        @endguest
    </ul>
</header>

<style>
    header nav a:hover {
        outline-color: red;
        transition: all 0.75s;
        color: red;
    }
</style>
