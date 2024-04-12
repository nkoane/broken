<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROOT</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <h1>BROKE/N</h1>
        <nav>
            <ul>
                <li><a href="/">root</a></li>
                <li><a href="/bio">biography</a></li>
                <li><a href="/tags">tags</a></li>
            </ul>
        </nav>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <p>ETSPx &copy; 2024</p>
    </footer>
</body>

</html>
