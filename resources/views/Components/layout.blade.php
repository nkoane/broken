<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>BROK/N</title>
        @vite('resources/css/app.css')
    </head>

    <body class="flex h-screen flex-col bg-gray-50">
        <header class="flex items-center justify-between border-b-2 border-gray-100 bg-gradient-to-b from-gray-50 to-yellow-50 p-4">
            <h1 class="text-3xl font-bold transition-all duration-500 hover:text-yellow-600"><a href="/">BROK+N</a></h1>
            <nav class="flex gap-2">
                <x-nav.link href="/bio" label="biography" />
                <x-nav.link href="/tags" label="tags" />
            </nav>
        </header>
        <main class="flex-grow bg-yellow-50 p-4">
            {{ $slot }}
        </main>
        <footer class="bg-gray-100 px-2 py-1 text-left text-xs">
            <p>ETSPx &copy; {{ date('Y') }}</p>
        </footer>
    </body>
</html>
