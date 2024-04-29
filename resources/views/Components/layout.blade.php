<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BROK/N</title>
    @vite('resources/css/app.css')
</head>

<body class="flex h-screen flex-col bg-gray-50">
    <x-header heading="{{ $heading }}" />
    <main class="flex-grow bg-yellow-50 p-4">
        {{ $slot }}
    </main>
    <x-footer holder="ETSPx" year="{{ date ('Y') }}"></x-footer>
</body>

</html>
